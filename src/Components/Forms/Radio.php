<?php

namespace Datalogix\TALLKit\Components\Forms;

use Datalogix\TALLKit\Components\BladeComponent;
use Datalogix\TALLKit\Concerns\BoundValues;
use Datalogix\TALLKit\Concerns\LabelText;
use Datalogix\TALLKit\Concerns\ValidationErrors;

class Radio extends BladeComponent
{
    use BoundValues;
    use LabelText;
    use ValidationErrors;

    /**
     * The radio name.
     *
     * @var string
     */
    public $name;

    /**
     * The radio value.
     *
     * @var mixed
     */
    public $value;

    /**
     * The radio is checked.
     *
     * @var bool
     */
    public $checked = false;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|bool|null  $label
     * @param  mixed  $value
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name,
        $label = '',
        $value = 1,
        $bind = null,
        $default = false,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setLabel($name, $label);

        $this->name = $name;
        $this->value = $value;
        $this->showErrors = $showErrors;

        if (old($name)) {
            $this->checked = old($name) == $value;
        }

        if (! session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getBoundValue($bind, $name) ?? $default;

            $this->checked = $boundValue == $this->value;
        }
    }
}
