<?php

namespace TALLKit\Components\Buttons;

use TALLKit\Components\Forms\Form;

class FormButton extends Form
{
    /**
     * @var string|null
     */
    public $text;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $text
     * @param  string  $method
     * @param  string|null  $action
     * @param  array|string|null  $route
     * @param  mixed  $bind
     * @param  string|null  $enctype
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $method = 'POST',
        $action = null,
        $route = null,
        $bind = null,
        $enctype = null,
        $theme = null
    ) {
        parent::__construct(
            $method,
            $action ?? request()->url(),
            $route,
            $bind,
            $enctype,
            $theme
        );

        $this->text = $text;
    }
}
