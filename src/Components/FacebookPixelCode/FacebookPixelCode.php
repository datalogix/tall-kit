<?php

namespace TALLKit\Components\FacebookPixelCode;

use TALLKit\View\BladeComponent;

class FacebookPixelCode extends BladeComponent
{
    protected array $props = [
        'id' => true,
        'noscript' => false,
    ];

    protected function processed(array $data)
    {
        $this->id = $this->id === true ? config('services.facebook-pixel-code.id') : $this->id;
    }
}
