<?php

namespace Datalogix\TALLKit\Components\Forms;

use Datalogix\TALLKit\Components\BladeComponent;
use Datalogix\TALLKit\Concerns\LabelText;
use Datalogix\TALLKit\Concerns\ValidationErrors;

class Group extends BladeComponent
{
    use LabelText;
    use ValidationErrors;

    /**
     * The group name.
     *
     * @var string
     */
    public $name;

    /**
     * Show group inline.
     *
     * @var bool
     */
    public $inline = false;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|bool|null  $label
     * @param  bool  $inline
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = '',
        $label = '',
        $inline = false,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setLabel($name, $label);

        $this->name = $name;
        $this->inline = $inline;
        $this->showErrors = $name && $showErrors;
    }
}
