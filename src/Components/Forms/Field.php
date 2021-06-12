<?php

namespace TALLKit\Components\Forms;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\LabelText;
use TALLKit\Concerns\ValidationErrors;

class Field extends BladeComponent
{
    use LabelText;
    use ValidationErrors;

    /**
     * @var string
     */
    public $name;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|bool|null  $label
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name,
        $label = '',
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = $name;
        $this->showErrors = $showErrors && $this->name;

        $this->setLabel($this->name, $label);
    }
}
