<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class GoogleFonts extends BladeComponent
{
    /**
     * @var string
     */
    public $url;

    /**
     * Create a new component instance.
     *
     * @param  string  $family
     * @return void
     */
    public function __construct($family)
    {
        parent::__construct(null);

        $this->url = filter_var($family, FILTER_VALIDATE_URL) === false
            ? 'https://fonts.googleapis.com/css2?family='.$family.'&display=swap'
            : $family;
    }
}
