<?php

namespace TALLKit\Components\GoogleFonts;

use Illuminate\Support\Collection;
use TALLKit\View\BladeComponent;

class GoogleFonts extends BladeComponent
{
    protected array $props = [
        'families' => null,
        'display' => null,
        'prefetch' => true,
        'preconnect' => true,
        'preload' => false,
        'useStylesheet' => false,
        'noscript' => null,
    ];

    protected function processed(array $data)
    {
        $this->url = $this->constructUrl($this->families, ! $this->display && $this->preload ? 'swap' : $this->display);
        $this->setVariables('url');
    }

    /**
     * Construct url.
     *
     * @param  string|array  $families
     * @param  string|null  $display
     * @return string
     */
    private function constructUrl($families, $display = null)
    {
        if (filter_var($families, FILTER_VALIDATE_URL) !== false) {
            return $families;
        }

        $params = Collection::make($families)->map(function ($family) {
            return 'family='.$family;
        });

        if ($display) {
            $params->push('display='.$display);
        }

        return 'https://fonts.googleapis.com/css2?'.$params->join('&');
    }
}
