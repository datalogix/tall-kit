<?php

namespace TALLKit\Components\GoogleTagManager;

use TALLKit\View\BladeComponent;

class GoogleTagManager extends BladeComponent
{
    protected array $props = [
        'id' => true,
        'noscript' => false,
    ];

    protected function processed(array $data)
    {
        $this->id = $this->id === true ? config('services.google-tag-manager.id') : $this->id;
    }
}
