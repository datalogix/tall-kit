<?php

namespace TALLKit\Components\Sliders;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\JsonOptions;

class Slider extends BladeComponent
{
    use JsonOptions;

    /**
     * @var string|bool|null
     */
    public $prevIcon;

    /**
     * @var string|bool|null
     */
    public $prevTooltip;

    /**
     * @var string|bool|null
     */
    public $nextIcon;

    /**
     * @var string|bool|null
     */
    public $nextTooltip;

    /**
     * Create a new component instance.
     *
     * @param  int|null  $selected
     * @param  bool|null  $loop
     * @param  bool|null  $autoplay
     * @param  int|null  $interval
     * @param  bool|null  $controls
     * @param  bool|null  $paginator
     * @param  bool|null  $progressbar
     * @param  bool|null  $stopOnOver
     * @param  mixed  $options
     * @param  string|bool|null  $prevIcon
     * @param  string|bool|null  $prevTooltip
     * @param  string|bool|null  $nextIcon
     * @param  string|bool|null  $nextTooltip
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $selected = null,
        $loop = null,
        $autoplay = null,
        $interval = null,
        $controls = null,
        $paginator = null,
        $progressbar = null,
        $stopOnOver = null,
        $options = null,
        $prevIcon = null,
        $prevTooltip = null,
        $nextIcon = null,
        $nextTooltip = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setOptions(array_replace_recursive([
            'selected' => $selected ?? 0,
            'loop' => $loop ?? false,
            'autoplay' => $autoplay ?? false,
            'interval' => $interval ?? 10,
            'controls' => $controls ?? true,
            'paginator' => $paginator ?? true,
            'progressbar' => $progressbar ?? false,
            'stopOnOver' => $stopOnOver ?? false,
        ], $options ?? []));

        $this->prevIcon = $prevIcon;
        $this->prevTooltip = $prevTooltip;
        $this->nextIcon = $nextIcon;
        $this->nextTooltip = $nextTooltip;
    }
}
