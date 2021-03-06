<?php

namespace TALLKit;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TALLKit
{
    use Assets, Components;

    /**
     * Styles.
     *
     * @param  array  $config
     * @return string
     */
    public function styles($config = [])
    {
        $debug = config('app.debug');

        $styles = $this->cssAssets(
            array_replace_recursive(config('tallkit.options', []), $config['options'] ?? []),
            array_replace_recursive(config('tallkit.assets', []), $this->getAllAssets(), $config['assets'] ?? [])
        );

        // HTML Label.
        $html = $debug ? ['<!-- TALLKit Styles -->'] : [];

        // CSS assets.
        $html[] = $debug ? $styles : $this->minify($styles);

        return implode("\n", $html);
    }

    /**
     * Scripts.
     *
     * @param  array  $config
     * @return string
     */
    public function scripts($config = [])
    {
        $debug = config('app.debug');

        $scripts = $this->javascriptAssets(
            array_replace_recursive(config('tallkit.options', []), $config['options'] ?? []),
            array_replace_recursive(config('tallkit.assets', []), $this->getAllAssets(), $config['assets'] ?? [])
        );

        // HTML Label.
        $html = $debug ? ['<!-- TALLKit Scripts -->'] : [];

        // JavaScript assets.
        $html[] = $debug ? $scripts : $this->minify($scripts);

        return implode("\n", $html);
    }

    /**
     * Css assets.
     *
     * @param  array  $options
     * @param  array  $assets
     * @return string
     */
    protected function cssAssets($options, $assets)
    {
        $styles = Collection::make();
        $scripts = Collection::make();

        if ($options['inject']['tailwindcss'] && $assets['tailwindcss']) {
            $styles->add($assets['tailwindcss']);
        }

        if ($options['inject']['alpine'] && $assets['alpine']) {
            $scripts->add($assets['alpine']);
        }

        if ($options['load_type'] === true) {
            Collection::make($assets)->filter(function ($key) {
                return $key !== 'tailwindcss' && $key !== 'alpine';
            })->each(function ($asset) use ($styles, $scripts) {
                $styles->add(Collection::make($asset)->filter(function ($value) {
                    return Str::endsWith($value, '.css');
                }));

                $scripts->add(Collection::make($asset)->filter(function ($value) {
                    return Str::endsWith($value, '.js');
                }));
            });
        }

        $htmlStyles = $styles->flatten()->map(function ($url) {
            return '<link href="'.$url.'" rel="stylesheet" />';
        })->join("\n");

        $nonce = isset($options['nonce']) ? " nonce=\"{$options['nonce']}\"" : '';

        $htmlScrips = $scripts->flatten()->map(function ($url) use ($assets, $nonce) {
            return '<script src="'.$url.'"'.((in_array($url, $assets['alpine'])) ? ' defer' : '').$nonce.'></script>';
        })->join("\n");

        return <<<HTML
        <style>[x-cloak] { display: none !important; }</style>
{$htmlStyles}
{$htmlScrips}
HTML;
    }

    /**
     * Javascript assets.
     *
     * @param  array  $options
     * @param  array  $assets
     * @return string
     */
    protected function javascriptAssets($options, $assets)
    {
        $jsonEncodedOptions = $options ? json_encode($options) : '';
        $jsonEncodedAssets = $assets ? json_encode($assets) : '';

        $appUrl = rtrim($options['asset_url'] ?? '', '/');

        $manifest = json_decode(file_get_contents(__DIR__.'/../dist/mix-manifest.json'), true);
        $versionedFileName = $manifest['/tallkit.js'];

        // Default to dynamic `tallkit.js` (served by a Laravel route).
        $fullAssetPath = "{$appUrl}/tallkit{$versionedFileName}";
        $assetWarning = null;
        $nonce = isset($options['nonce']) ? " nonce=\"{$options['nonce']}\"" : '';

        // Use static assets if they have been published.
        if (file_exists(public_path('vendor/tallkit/mix-manifest.json'))) {
            $publishedManifest = json_decode(file_get_contents(public_path('vendor/tallkit/mix-manifest.json')), true);
            $versionedFileName = $publishedManifest['/tallkit.js'];

            $fullAssetPath = ($this->isRunningServerless() ? config('app.asset_url') : $appUrl).'/vendor/tallkit'.$versionedFileName;

            if ($manifest !== $publishedManifest) {
                $assetWarning = <<<'HTML'
<script{$nonce}>
    console.warn("TALLKit: The published TALLKit assets are out of date.");
</script>
HTML;
            }
        }

        $tallkitAssets = $this->renderAssets();
        $tallkitComponents = $this->renderComponents($nonce);

        // Adding semicolons for this JavaScript is important,
        // because it will be minified in production.
        return <<<HTML
{$assetWarning}
<script src="{$fullAssetPath}" data-turbo-eval="false" data-turbolinks-eval="false"{$nonce}></script>
<script data-turbo-eval="false" data-turbolinks-eval="false"{$nonce}>
    if (!window.tallkit) {
        window.tallkit = new TALLKit({$jsonEncodedOptions}, {$jsonEncodedAssets});
        {$tallkitAssets}
    }
</script>
{$tallkitComponents}
<script data-turbo-eval="false" data-turbolinks-eval="false"{$nonce}>
    window.deferLoadingAlpine = function (callback) {
        window.addEventListener('tallkit:load', function () {
            callback();
        });
    };

    // Support for Alpine V3.
    window.addEventListener('alpine:initializing', () => {
        window.tallkit.init();
    })

    document.addEventListener('DOMContentLoaded', function () {
        window.tallkit.init();
    });
</script>
HTML;
    }

    /**
     * Minify.
     *
     * @param  string  $subject
     * @return string
     */
    protected function minify($subject)
    {
        return preg_replace('~(\v|\t|\s{2,})~m', '', $subject);
    }

    /**
     * Is running serverless.
     *
     * @return bool
     */
    protected function isRunningServerless()
    {
        return in_array($_ENV['SERVER_SOFTWARE'] ?? null, [
            'vapor',
            'bref',
        ]);
    }
}
