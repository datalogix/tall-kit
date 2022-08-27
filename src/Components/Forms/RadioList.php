<?php

namespace TALLKit\Components\Forms;

use TALLKit\Concerns\PrepareOptions;

class RadioList extends Group
{
    use PrepareOptions;

    /**
     * @var mixed
     */
    public $bind;

    /**
     * @var string|null
     */
    public $modifier;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  mixed  $options
     * @param  string|array|int|null  $itemValue
     * @param  string|array|int|null  $itemText
     * @param  bool|null  $inline
     * @param  string|bool|int|null  $grid
     * @param  bool|null  $fieldset
     * @param  bool|null  $showErrors
     * @param  mixed  $bind
     * @param  string|null  $modifier
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $label = null,
        $options = null,
        $itemValue = null,
        $itemText = null,
        $inline = null,
        $grid = null,
        $fieldset = null,
        $showErrors = null,
        $bind = null,
        $modifier = null,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $label,
            $inline,
            $grid,
            $fieldset,
            $showErrors,
            $theme
        );

        $this->setOptions($options, $itemValue, $itemText);
        $this->bind = $bind;
        $this->modifier = $modifier;
    }
}
