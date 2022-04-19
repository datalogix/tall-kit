<?php

namespace TALLKit\Components\Scripts;

class FacebookPixelCode extends Script
{
    /**
     * @var string|bool|null
     */
    public $id;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $id
     * @param  bool|null  $noscript
     * @return void
     */
    public function __construct($id = null, $noscript = null)
    {
        parent::__construct($noscript);

        $this->id = $id === true ? config('services.facebook-pixel-code.id') : $id;
    }
}
