<?php

namespace Datalogix\TALLKit\Components\Buttons;

use Datalogix\TALLKit\Components\BladeComponent;

class FormButton extends BladeComponent
{
    /**
     * The button text.
     *
     * @var string
     */
    public $text;

    /**
     * The form method.
     *
     * @var string
     */
    public $method;

    /**
     * The form action.
     *
     * @var string
     */
    public $action;

    /**
     * Create a new component instance.
     *
     * @param  string  $method
     * @param  string  $action
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = '',
        $method = 'POST',
        $action = '',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->method = $method;
        $this->action = $action ?: request()->url();
    }
}
