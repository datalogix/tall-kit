<?php

namespace TALLKit\Components\Bars;

use TALLKit\Components\BladeComponent;

class Progressbar extends BladeComponent
{
    /**
     * @var int
     */
    public $value;

    /**
     * @var int
     */
    public $min;

    /**
     * @var int
     */
    public $max;

    /**
     * @var string|bool
     */
    public $color;

    /**
     * @var string|int|bool
     */
    public $duration;

    /**
     * @var string|bool
     */
    public $size;

    /**
     * @var string|bool
     */
    public $rounded;

    /**
     * @var bool
     */
    public $showValue;

    /**
     * Create a new component instance.
     *
     * @param  int|null  $value
     * @param  int|null  $min
     * @param  int|null  $max
     * @param  string|bool|null  $color
     * @param  string|int|bool|null  $duration
     * @param  string|bool|null  $size
     * @param  string|bool|null  $rounded
     * @param  bool|null  $showValue
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $value = null,
        $min = null,
        $max = null,
        $color = null,
        $duration = null,
        $size = null,
        $rounded = null,
        $showValue = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->value = $value ?? 0;
        $this->min = $min ?? 0;
        $this->max = $max ?? 100;
        $this->color = $color ?? 'default';
        $this->duration = $duration ?? 'default';
        $this->size = $size ?? 'default';
        $this->rounded = $rounded ?? 'default';
        $this->showValue = $showValue ?? true;
    }
}
