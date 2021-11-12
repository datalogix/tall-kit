<?php

namespace TALLKit\Components\Forms;

class Group extends Field
{
    /**
     * @var string
     */
    public $type;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|bool|null  $label
     * @param  bool|null  $inline
     * @param  string|bool|int|null  $grid
     * @param  bool|null  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $label = null,
        $inline = null,
        $grid = null,
        $showErrors = null,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $label,
            $showErrors,
            $theme
        );

        $this->type = 'block';

        if ($inline ?? false) {
            $this->type = 'inline';
        }

        if ($grid ?? false) {
            $this->type = 'grid-'.($grid === true ? 1 : $grid);
        }
    }
}
