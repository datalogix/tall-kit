<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class GoogleAnalytics extends BladeComponent
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
        parent::__construct(null);

        $this->id = $id === true ? config('services.google-analytics.id') : $id;
    }
}
