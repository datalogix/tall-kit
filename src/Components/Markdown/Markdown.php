<?php

namespace TALLKit\Components\Markdown;

use Illuminate\Support\Facades\Cache;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;
use TALLKit\View\BladeComponent;

class Markdown extends BladeComponent
{
    protected array $props = [
        'options' => [
            'html_input' => 'allow',
            'allow_unsafe_links' => true,
        ],
        'ttl' => 3600,
    ];

    public function toHtml($markdown)
    {
        if (! $this->ttl) {
            return $this->converter()->convert($markdown);
        }

        return Cache::remember(
            'markdown.'.base64_encode(serialize(compact('markdown') + $this->options)),
            $this->ttl,
            fn () => $this->converter()->convert($markdown)
        );
    }

    protected function converter()
    {
        $config = $this->options;
        $blocks = target_get($config, 'blocks', []);
        $inlines = target_get($config, 'inlines', []);
        $delimiters = target_get($config, 'delimiters', []);
        $renderers = target_get($config, 'renderers', []);
        $extensions = target_get($config, 'extensions', []);
        $listeners = target_get($config, 'listeners', []);

        data_set($config, 'blocks', null);
        data_set($config, 'inlines', null);
        data_set($config, 'delimiters', null);
        data_set($config, 'renderers', null);
        data_set($config, 'extensions', null);
        data_set($config, 'listeners', null);

        $environment = new Environment(array_filter($config));
        $environment->addExtension(new CommonMarkCoreExtension());

        foreach ($blocks as $block) {
            $environment->addBlockStartParser(is_array($block) ? $block[0] : $block, is_array($block) ? $block[1] ?? 0 : 0);
        }

        foreach ($inlines as $inline) {
            $environment->addInlineParser(is_array($inline) ? $inline[0] : $inline, is_array($inline) ? $inline[1] ?? 0 : 0);
        }

        foreach ($delimiters as $delimiter) {
            $environment->addDelimiterProcessor($delimiter);
        }

        foreach ($renderers as $renderer) {
            if (is_array($renderer)) {
                $environment->addRenderer($renderer[0], $renderer[1], $renderer[2] ?? 0);
            }
        }

        foreach ($extensions as $extension) {
            $environment->addExtension($extension);
        }

        foreach ($listeners as $listener) {
            if (is_array($listener)) {
                $environment->addEventListener($listener[0], $listener[1], $listener[2] ?? 0);
            }
        }

        return new MarkdownConverter($environment);
    }
}
