<?php

namespace TALLKit\Components\Forms;

use TALLKit\Concerns\ValidationErrors;

class Field extends FieldGroup
{
    use ValidationErrors;

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string|bool|null
     */
    public $label;

    /**
     * @var bool
     */
    public $groupable;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @param  bool  $groupable
     * @param  string|null  $prependText
     * @param  string|null  $prependIcon
     * @param  string|null  $appendText
     * @param  string|null  $appendIcon
     * @return void
     */
    public function __construct(
        $name = null,
        $label = null,
        $showErrors = true,
        $theme = null,
        $groupable = false,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null,
    ) {
        parent::__construct(
            $theme,
            $prependText,
            $prependIcon,
            $appendText,
            $appendIcon
        );

        $this->name = $name;
        $this->label = $label ?? $name;
        $this->showErrors = $showErrors && $name;
        $this->groupable = $groupable;
    }
}
