<?php

namespace TALLKit\Components\Forms;

class Group extends Field
{
    /**
     * @var string
     */
    public $type = false;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|bool|null  $label
     * @param  bool  $inline
     * @param  bool|string|int  $grid
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $label = null,
        $inline = false,
        $grid = false,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $label,
            $showErrors,
            $theme
        );

        $this->type = 'block';

        if ($inline) {
            $this->type = 'inline';
        }

        if ($grid) {
            $this->type = 'grid-'.($grid === true ? 1 : $grid);
        }
    }
}
