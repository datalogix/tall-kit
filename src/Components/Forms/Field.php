<?php

namespace TALLKit\Components\Forms;

use Illuminate\Support\Str;
use TALLKit\Concerns\FieldNameAndValue;
use TALLKit\Concerns\ValidationErrors;

class Field extends FieldGroup
{
    use FieldNameAndValue;
    use ValidationErrors;

    /**
     * @var string|bool|null
     */
    public $label;

    /**
     * @var bool
     */
    public $groupable;

    /**
     * @var mixed
     */
    public $display;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  bool|null  $showErrors
     * @param  string|null  $theme
     * @param  bool|null  $groupable
     * @param  string|null  $prependText
     * @param  string|null  $prependIcon
     * @param  string|null  $appendText
     * @param  string|null  $appendIcon
     * @param  mixed  $display
     * @return void
     */
    public function __construct(
        $name = null,
        $label = null,
        $showErrors = null,
        $theme = null,
        $groupable = null,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null,
        $display = null
    ) {
        parent::__construct(
            $theme,
            $prependText,
            $prependIcon,
            $appendText,
            $appendIcon
        );

        $this->setName($name);

        $this->label = $label ?? Str::before($name, '[]');
        $this->showErrors = ($showErrors ?? true) && $name;
        $this->groupable = $groupable ?? false;
        $this->display = $display;
    }
}
