<?php

namespace TALLKit\Components\Supports;

use Lorisleiva\CronTranslator\CronTranslator;
use TALLKit\Components\BladeComponent;

class Cron extends BladeComponent
{
    /**
     * @var string|null
     */
    public $schedule;

    /**
     * @var string
     */
    protected $locale;

    /**
     * @var bool
     */
    protected $use24hour;

    /**
     * @var bool
     */
    public $human;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $schedule
     * @param  string|null  $locale
     * @param  bool  $use24hour
     * @param  bool  $human
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $schedule = null,
        $locale = null,
        $use24hour = false,
        $human = false,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->schedule = $schedule;
        $this->locale = $locale ?? app()->getLocale();
        $this->use24hour = $use24hour;
        $this->human = $human;
    }

    /**
     * Translate.
     *
     * @param  string  $schedule
     * @return string
     */
    public function translate($schedule)
    {
        return CronTranslator::translate($schedule, $this->locale, $this->use24hour);
    }
}
