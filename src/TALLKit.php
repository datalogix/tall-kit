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
     * @param  mixed  $config
     * @return string
     */
    public function styles($config = null)
    {
        $debug = config('app.debug');

        $styles = $this->cssAssets(
            array_replace_recursive(config('tallkit.options', []), data_get($config, 'options', [])),
            array_replace_recursive(config('tallkit.assets', []), $this->getAllAssets(), data_get($config, 'assets', []))
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
     * @param  mixed  $config
     * @return string
     */
    public function scripts($config = null)
    {
        $debug = config('app.debug');

        $scripts = $this->javascriptAssets(
            array_replace_recursive(config('tallkit.options', []), data_get($config, 'options', [])),
            array_replace_recursive(config('tallkit.assets', []), $this->getAllAssets(), data_get($config, 'assets', []))
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

        if ($tailwindcss = data_get($assets, 'tailwindcss') && data_get($options, 'inject.tailwindcss')) {
            $styles->add($tailwindcss);
            $scripts->add($tailwindcss);
        }

        if ($alpine = data_get($assets, 'alpine') && data_get($options, 'inject.alpine')) {
            $styles->add($alpine);
            $scripts->add($alpine);
        }

        if (data_get($options, 'load_type') === true) {
            Collection::make($assets)->filter(function ($key) {
                return $key !== 'tailwindcss' && $key !== 'alpine';
            })->each(function ($asset) use ($styles, $scripts) {
                $styles->add($asset);
                $scripts->add($asset);
            });
        }

        $htmlStyles = $styles->flatten()->filter(function ($value) {
            return Str::endsWith($value, '.css');
        })->map(function ($url) {
            return '<link href="'.$url.'" rel="stylesheet" />';
        })->join("\n");

        $nonce = data_get($options, 'nonce') ? ' nonce="'.data_get($options, 'nonce').'"' : '';

        $htmlScrips = $scripts->flatten()->filter(function ($value) {
            return Str::endsWith($value, '.js');
        })->map(function ($url) use ($assets, $nonce) {
            return '<script src="'.$url.'"'.(in_array($url, data_get($assets, 'alpine', [])) ? ' defer' : '').$nonce.'></script>';
        })->join("\n");

        return <<<HTML
<style>
    [x-cloak] {display:none!important;}
    .slider-snap{-ms-overflow-style:none;scroll-behavior:smooth;-ms-scroll-snap-type:x mandatory;scroll-snap-type:x mandatory;}
    .slider-snap::-webkit-scrollbar{display:none;}
    .slider-snap>*{scroll-snap-align:center;width: 100%;flex-shrink: 0;}
    .filepond--root{margin-bottom:0!important;}
    .filepond--panel-root{border-radius:0!important;}
</style>
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

        $appUrl = rtrim(data_get($options, 'asset_url', ''), '/');

        $manifest = json_decode(file_get_contents(__DIR__.'/../dist/mix-manifest.json'), true);
        $versionedFileName = data_get($manifest, '/tallkit.js');

        // Default to dynamic `tallkit.js` (served by a Laravel route).
        $fullAssetPath = "{$appUrl}/tallkit{$versionedFileName}";
        $assetWarning = null;

        $nonce = data_get($options, 'nonce') ? ' nonce="'.data_get($options, 'nonce').'"' : '';

        // Use static assets if they have been published.
        if (file_exists(public_path('vendor/tallkit/mix-manifest.json'))) {
            $publishedManifest = json_decode(file_get_contents(public_path('vendor/tallkit/mix-manifest.json')), true);
            $versionedFileName = data_get($publishedManifest, '/tallkit.js');

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

    window.addEventListener('alpine:initializing', function () {
        window.tallkit.init();
    });

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
        return in_array(data_get($_ENV, 'SERVER_SOFTWARE'), [
            'vapor',
            'bref',
        ]);
    }
}
