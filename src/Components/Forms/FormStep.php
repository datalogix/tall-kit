<?php

namespace TALLKit\Components\Forms;

use TALLKit\Components\BladeComponent;

class FormStep extends BladeComponent
{
    /**
     * @var string
     */
    public $mode;

    /**
     * @var bool|null
     */
    public $active;

    /**
     * @var bool|null
     */
    public $completed;

    /**
     * @var bool|null
     */
    public $uncompleted;

    /**
     * @var string|int|null
     */
    public $label;

    /**
     * @var string|null
     */
    public $icon;

    /**
     * @var string|null
     */
    public $title;

    /**
     * @var string|null
     */
    public $subtitle;

    /**
     * Create a new component instance.
     *
     * @param  strin|null  $mode
     * @param  bool|null  $active
     * @param  bool|null  $completed
     * @param  bool|null  $uncompleted
     * @param  string|int|null  $label
     * @param  string|bool|array|null  $icon
     * @param  string|null  $title
     * @param  string|null  $subtitle
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $mode = null,
        $active = null,
        $completed = null,
        $uncompleted = null,
        $label = null,
        $icon = null,
        $title = null,
        $subtitle = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->mode = $mode ?? 'horizontal';
        $this->active = $active;
        $this->completed = $completed;
        $this->uncompleted = $uncompleted;
        $this->label = $label;
        $this->icon = $icon;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }
}
