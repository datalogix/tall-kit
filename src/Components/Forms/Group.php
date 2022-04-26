<?php

namespace TALLKit\Components\Forms;

class Group extends Field
{
    /**
     * @var bool|null
     */
    public $inline;

    /**
     * @var string|bool|int|null
     */
    public $grid;

    /**
     * @var bool|null
     */
    public $fieldset;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  bool|null  $inline
     * @param  string|bool|int|null  $grid
     * @param  bool|null  $fieldset
     * @param  bool|null  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $label = null,
        $inline = null,
        $grid = null,
        $fieldset = null,
        $showErrors = null,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $label,
            $showErrors,
            $theme
        );

        $this->inline = $inline;
        $this->grid = $grid;
        $this->fieldset = $fieldset;
    }

    /**
     * Get type.
     *
     * @return bool
     */
    public function getType()
    {
        if ($this->grid ?? false) {
            return 'grid-'.($this->grid === true ? 1 : $this->grid);
        }

        if ($this->inline ?? false) {
            return 'inline';
        }

        return 'block';
    }
}
