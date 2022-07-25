<?php

namespace TALLKit\Components\Scripts;

use Illuminate\Support\Collection;

class GoogleFonts extends Script
{
    /**
     * @var string
     */
    public $url;

    /**
     * @var bool
     */
    public $prefetch;

    /**
     * @var bool
     */
    public $preconnect;

    /**
     * @var bool
     */
    public $preload;

    /**
     * @var bool
     */
    public $useStylesheet;

    /**
     * Create a new component instance.
     *
     * @param  string|array  $families
     * @param  string|null  $display
     * @param  bool|null  $prefetch
     * @param  bool|null  $preconnect
     * @param  bool|null  $preload
     * @param  bool|null  $useStylesheet
     * @param  bool|null  $noscript
     * @return void
     */
    public function __construct(
        $families,
        $display = null,
        $prefetch = null,
        $preconnect = null,
        $preload = null,
        $useStylesheet = null,
        $noscript = null
    ) {
        parent::__construct($noscript);

        $this->prefetch = $prefetch ?? true;
        $this->preconnect = $preconnect ?? true;
        $this->preload = $preload ?? false;
        $this->useStylesheet = $useStylesheet ?? false;

        if (! $display && $this->preload) {
            $display = 'swap';
        }

        $this->url = $this->constructUrl($families, $display);
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
