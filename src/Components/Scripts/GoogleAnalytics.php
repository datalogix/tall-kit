<?php

namespace TALLKit\Components\Scripts;

class GoogleAnalytics extends Script
{
    /**
     * @var string|bool|null
     */
    public $id;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $id
     * @return void
     */
    public function __construct($id = null)
    {
        $this->id = $id === true ? config('services.google-analytics.id') : $id;
    }
}
