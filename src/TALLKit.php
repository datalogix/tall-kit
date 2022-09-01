<?php

namespace TALLKit;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TALLKit
{
    use Assets, Components;

    /**
     * Head.
     *
     * @param  mixed  $config
     * @return string
     */
    public function head($config = null)
    {
        $debug = config('app.debug');

        $styles = $this->headAssets(
            array_replace_recursive(config('tallkit.options', []), target_get($config, 'options', [])),
            array_replace_recursive(config('tallkit.assets', []), $this->getAllAssets(), target_get($config, 'assets', []))
        );

        // HTML Label.
        $html = $debug ? ['<!-- TALLKit Styles -->'] : [];

        // Assets.
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

        $assets = $this->scriptsAssets(
            array_replace_recursive(config('tallkit.options', []), target_get($config, 'options', [])),
            array_replace_recursive(config('tallkit.assets', []), $this->getAllAssets(), target_get($config, 'assets', []))
        );

        // HTML Label.
        $html = $debug ? ['<!-- TALLKit Scripts -->'] : [];

        // Assets.
        $html[] = $debug ? $assets : $this->minify($assets);

        return implode("\n", $html);
    }

    /**
     * Head assets.
     *
     * @param  array  $options
     * @param  array  $assets
     * @return string
     */
    protected function headAssets($options, $assets)
    {
        $styles = Collection::make([$this->getFullAssetPath($options, 'style.css')]);
        $scripts = Collection::make();

        if (target_get($options, 'inject.tailwindcss') && $tailwindcss = target_get($assets, 'tailwindcss')) {
            $styles->add($tailwindcss);
            $scripts->add($tailwindcss);
        }

        if (target_get($options, 'inject.alpine') && $alpine = target_get($assets, 'alpine')) {
            $styles->add($alpine);
            $scripts->add($alpine);
        }

        if (target_get($options, 'load_type') === true) {
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

        $tallkitStylesComponents = $this->renderStylesComponents();

        $nonce = '';

        if ($nonceValue = target_get($options, 'nonce')) {
            $nonce = ' nonce="'.$nonceValue.'"';
        }

        $htmlScripts = $scripts->flatten()->filter(function ($value) {
            return ! Str::endsWith($value, '.css');
        })->map(function ($url) use ($assets, $nonce) {
            $defer = (in_array($url, target_get($assets, 'alpine', [])) ? ' defer' : '');
            return '<script data-turbo-eval="false" data-turbolinks-eval="false" src="'.$url.'"'.$defer.$nonce.'></script>';
        })->join("\n");

        return <<<HTML
{$htmlStyles}
{$tallkitStylesComponents}
{$htmlScripts}
HTML;
    }

    /**
     * Scripts assets.
     *
     * @param  array  $options
     * @param  array  $assets
     * @return string
     */
    protected function scriptsAssets($options, $assets)
    {
        $jsonEncodedOptions = $options ? json_encode($options) : '';
        $jsonEncodedAssets = $assets ? json_encode($assets) : '';
        $fullAssetPath = $this->getFullAssetPath($options, 'resources/js/tallkit.js');
        $assetWarning = null;

        $nonce = '';

        if ($nonceValue = target_get($options, 'nonce')) {
            $nonce = ' nonce="'.$nonceValue.'"';
        }

        if ($this->isAssetsOutOfDate()) {
            $assetWarning = <<<'HTML'
<script{$nonce}>
    console.warn('TALLKit: The published TALLKit assets are out of date.');
</script>
HTML;
        }

        $tallkitAssets = $this->renderAssets();
        $tallkitScriptsComponents = $this->renderScriptsComponents($nonce);

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
{$tallkitScriptsComponents}
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
     * Get full asset path.
     *
     * @param  array  $options
     * @param  string  $file
     * @return string
     */
    protected function getFullAssetPath($options, $file)
    {
        $appUrl = rtrim(target_get($options, 'asset_url', ''), '/');

        $manifest = json_decode(file_get_contents(__DIR__.'/../dist/manifest.json'), true);
        $versionedFileName = $manifest[$file]['file'];
        $fullAssetPath = "{$appUrl}/tallkit/{$versionedFileName}";

        // Use static assets if they have been published.
        if (file_exists(public_path('vendor/tallkit/manifest.json'))) {
            $publishedManifest = json_decode(file_get_contents(public_path('vendor/tallkit/manifest.json')), true);
            $versionedFileName = $publishedManifest[$file]['file'];
            $fullAssetPath = ($this->isRunningServerless() ? config('app.asset_url') : $appUrl).'/vendor/tallkit/'.$versionedFileName;
        }

        return $fullAssetPath;
    }

    /**
     * Is assets out of date.
     *
     * @return bool
     */
    protected function isAssetsOutOfDate()
    {
        $publicManifestPath = public_path('vendor/tallkit/manifest.json');

        if (! file_exists($publicManifestPath)) {
            return false;
        }

        $manifest = json_decode(file_get_contents(__DIR__.'/../dist/manifest.json'), true);
        $publishedManifest = json_decode(file_get_contents($publicManifestPath), true);

        return $manifest !== $publishedManifest;
    }

    /**
     * Is running serverless.
     *
     * @return bool
     */
    protected function isRunningServerless()
    {
        return in_array(target_get($_ENV, 'SERVER_SOFTWARE'), [
            'vapor',
            'bref',
        ]);
    }
}
