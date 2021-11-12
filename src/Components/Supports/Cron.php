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
     * @param  bool|null  $use24hour
     * @param  bool|null  $human
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $schedule = null,
        $locale = null,
        $use24hour = null,
        $human = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->schedule = $schedule;
        $this->locale = $locale ?? app()->getLocale();
        $this->use24hour = $use24hour ?? false;
        $this->human = $human ?? false;
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
