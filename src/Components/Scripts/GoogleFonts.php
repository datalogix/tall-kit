<?php

namespace TALLKit\Components\Scripts;

class GoogleFonts extends Script
{
    /**
     * @var string
     */
    public $url;

    /**
     * Create a new component instance.
     *
     * @param  string  $family
     * @param  bool|null  $noscript
     * @return void
     */
    public function __construct($family, $noscript = null)
    {
        parent::__construct($noscript);

        $this->url = filter_var($family, FILTER_VALIDATE_URL) === false
            ? 'https://fonts.googleapis.com/css2?family='.$family.'&display=swap'
            : $family;
    }
}
