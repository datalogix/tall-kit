<?php

namespace TALLKit;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait Components
{
    /**
     * All of the registered components.
     *
     * @var array
     */
    protected $components = [];

    /**
     * Register component.
     *
     * @param  string  $name
     * @param  string|string[]|null  $content
     * @param  bool  $overwrite
     * @return void
     */
    public function registerComponent($name, $content = null, $overwrite = true)
    {
        if (empty($content)) {
            return;
        }

        if ($overwrite || ! $this->hasComponent($name)) {
            $this->components[$name] = $content;
        }
    }

    /**
     * Has component.
     *
     * @param  string  $name
     * @return bool
     */
    public function hasComponent($name)
    {
        return array_key_exists($name, $this->components);
    }

    /**
     * Unregister component.
     *
     * @param  string  $name
     * @return void
     */
    public function unregisterComponent($name)
    {
        if ($this->hasComponent($name)) {
            unset($this->components[$name]);
        }
    }

    /**
     * Get all components.
     *
     * @return array
     */
    public function getAllComponents()
    {
        return $this->components;
    }

    /**
     * Get component.
     *
     * @param  string  $name
     * @return string|string[]
     */
    public function getComponent($name)
    {
        return $this->components[$name];
    }

    /**
     * Render styles components.
     *
     * @return string
     */
    public function renderStylesComponents()
    {
        $result = [];

        foreach ($this->components as $name => $contents) {
            foreach (Arr::wrap($contents) as $pos => $content) {
                if (! Str::endsWith($content, '.css')) {
                    continue;
                }

                $href = route('tallkit.component', compact('name', 'pos'));
                $result[] = '<link href="'.$href.'" rel="stylesheet" />';
            }
        }

        return implode("\n", $result);
    }

    /**
     * Render scripts components.
     *
     * @param  string  $nonce
     * @return string
     */
    public function renderScriptsComponents($nonce = '')
    {
        $result = [];

        foreach ($this->components as $name => $contents) {
            foreach (Arr::wrap($contents) as $pos => $content) {
                if (Str::endsWith($content, '.css')) {
                    continue;
                }

                if (Str::endsWith($content, '.js') || Str::contains($content, '.js?')) {
                    $src = route('tallkit.component', compact('name', 'pos'));
                    $result[] = <<<HTML
<script src="{$src}"{$nonce}></script>
HTML;
                } else {
                    $content = $actions ?? '{}';
                    $result[] = <<<HTML
<script{$nonce}>
    window.tallkit.components.register('{$name}', $content);
</script>
HTML;
                }
            }
        }

        return implode("\n", $result);
    }
}
