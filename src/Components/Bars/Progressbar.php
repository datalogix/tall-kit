<?php

namespace TALLKit\Components\Bars;

use TALLKit\Components\BladeComponent;

class Progressbar extends BladeComponent
{
    /**
     * @var int|float
     */
    public $value;

    /**
     * @var int|float
     */
    public $min;

    /**
     * @var int|float
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
     * @param  int|float|null  $value
     * @param  int|float|null  $min
     * @param  int|float|null  $max
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

        $this->value = filter_var($value, FILTER_VALIDATE_FLOAT | FILTER_VALIDATE_INT) ?: 0;
        $this->min = filter_var($min, FILTER_VALIDATE_FLOAT | FILTER_VALIDATE_INT) ?: 0;
        $this->max = filter_var($max, FILTER_VALIDATE_FLOAT | FILTER_VALIDATE_INT) ?: 100;
        $this->color = $color ?? 'default';
        $this->duration = $duration ?? 'default';
        $this->size = $size ?? 'default';
        $this->rounded = $rounded ?? 'default';
        $this->showValue = $showValue ?? true;
    }
}
