<?php

namespace TALLKit;

class TALLKit
{
    use Assets, Components;

    /**
     * Init.
     *
     * @param  array  $options
     * @param  array  $assets
     * @return string
     */
    public function init($options = [], $assets = [])
    {
        $debug = config('app.debug');
        $scripts = $this->scripts(
            array_merge(config('tallkit.options', []), $options),
            array_merge(config('tallkit.assets', []), $assets)
        );

        // HTML Label.
        $html = $debug ? ['<!-- TALLKit Scripts -->'] : [];

        // JavaScript assets.
        $html[] = $debug ? $scripts : $this->minify($scripts);

        return implode("\n", $html);
    }

    /**
     * Scripts.
     *
     * @param  array  $options
     * @param  array  $assets
     * @return string
     */
    protected function scripts($options, $assets)
    {
        $jsonEncodedOptions = $options ? json_encode($options) : '';
        $jsonEncodedAssets = $assets ? json_encode($assets) : '';

        $appUrl = rtrim($options['asset_url'] ?? '', '/');

        $manifest = json_decode(file_get_contents(__DIR__.'/../dist/mix-manifest.json'), true);
        $versionedFileName = $manifest['/tallkit.js'];

        // Default to dynamic `tallkit.js` (served by a Laravel route).
        $fullAssetPath = "{$appUrl}/tallkit{$versionedFileName}";
        $assetWarning = null;

        // Use static assets if they have been published.
        if (file_exists(public_path('vendor/tallkit/mix-manifest.json'))) {
            $publishedManifest = json_decode(file_get_contents(public_path('vendor/tallkit/mix-manifest.json')), true);
            $versionedFileName = $publishedManifest['/tallkit.js'];

            $fullAssetPath = ($this->isRunningServerless() ? config('app.asset_url') : $appUrl).'/vendor/tallkit'.$versionedFileName;

            if ($manifest !== $publishedManifest) {
                $assetWarning = <<<'HTML'
<script>
    console.warn("TALLKit: The published TALLKit assets are out of date.")
</script>
HTML;
            }
        }

        $tallkitAssets = $this->renderAssets();
        $tallkitComponents = $this->renderComponents();

        // Adding semicolons for this JavaScript is important,
        // because it will be minified in production.
        return <<<HTML
{$assetWarning}
<script src="{$fullAssetPath}" data-turbo-eval="false" data-turbolinks-eval="false"></script>
<script data-turbo-eval="false" data-turbolinks-eval="false">
    if (!window.tallkit) {
        window.tallkit = new TALLKit({$jsonEncodedOptions}, {$jsonEncodedAssets});
        {$tallkitAssets}
    }
</script>
{$tallkitComponents}
<script data-turbo-eval="false" data-turbolinks-eval="false">
    window.tallkit.init();

    window.deferLoadingAlpine = function (callback) {
        window.addEventListener('tallkit:load', function () {
            callback();
        });
    };
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
