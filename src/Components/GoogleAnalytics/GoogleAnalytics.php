<?php

namespace TALLKit\Components\GoogleAnalytics;

use TALLKit\View\BladeComponent;

class GoogleAnalytics extends BladeComponent
{
    protected array $props = [
        'id' => true,
    ];

    protected function processed(array $data)
    {
        $this->id = $this->id === true ? config('services.google-analytics.id') : $this->id;
    }
}
