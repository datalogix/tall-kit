<?php

namespace TALLKit;

trait Assets
{
    /**
     * All of the registered assets.
     *
     * @var array
     */
    protected $assets = [];

    /**
     * Register asset.
     *
     * @param  string  $name
     * @param  string|string[]  $content
     * @param  bool  $overwrite
     * @return void
     */
    public function registerAsset($name, $content = null, $overwrite = true)
    {
        if ($overwrite || ! $this->hasAsset($name)) {
            $this->assets[$name] = $content;
        }
    }

    /**
     * Has asset.
     *
     * @param  string  $name
     * @return bool
     */
    public function hasAsset($name)
    {
        return array_key_exists($name, $this->assets);
    }

    /**
     * Unregister asset.
     *
     * @param  string  $name
     * @return void
     */
    public function unregisterAsset($name)
    {
        if ($this->hasAsset($name)) {
            unset($this->assets[$name]);
        }
    }

    /**
     * Get all assets.
     *
     * @return array
     */
    public function getAllAssets()
    {
        return $this->assets;
    }

    /**
     * Get asset.
     *
     * @param  string  $name
     * @return string|string[]
     */
    public function getAsset($name)
    {
        return $this->assets[$name];
    }

    /**
     * Render assets.
     *
     * @return string
     */
    public function renderAssets()
    {
        $result = [];

        foreach ($this->assets as $name => $assets) {
            $assetsEncoded = json_encode($assets);
            $result[] = <<<HTML
window.tallkit.assets.register('$name', $assetsEncoded);
HTML;
        }

        return implode("\n", $result);
    }
}
