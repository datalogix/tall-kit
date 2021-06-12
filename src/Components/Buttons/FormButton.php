<?php

namespace TALLKit\Components\Buttons;

use TALLKit\Components\BladeComponent;

class FormButton extends BladeComponent
{
    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $method;

    /**
     * @var string
     */
    public $action;

    /**
     * Create a new component instance.
     *
     * @param  string  $method
     * @param  string|null  $action
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = '',
        $method = 'POST',
        $action = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->method = $method;
        $this->action = $action ?? request()->url();
    }
}
