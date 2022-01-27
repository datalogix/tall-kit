<?php

namespace TALLKit\Components\Forms;

use Illuminate\Support\Collection;

class CheckboxList extends Group
{
    /**
     * @var \Illuminate\Support\Collection
     */
    public $options;

    /**
     * @var mixed
     */
    public $bind;

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
        $options = null,
        $bind = null,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $label,
            $inline,
            $grid,
            $showErrors,
            $theme
        );

        $this->options = Collection::make($options);
        $this->bind = $bind;
    }
}
