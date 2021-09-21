<?php

namespace TALLKit\Components\Datetimes;

use Carbon\CarbonInterface;
use DateInterval;
use DateTimeInterface;
use Illuminate\Support\Carbon;
use TALLKit\Components\BladeComponent;

class Countdown extends BladeComponent
{
    /**
     * @var CarbonInterface
     */
    public $expires;

    /**
     * Create a new component instance.
     *
     * @param  string|DateTimeInterface|null  $expires
     * @param  DateTimeZone|string|null  $tz
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $expires = null,
        $tz = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->expires = Carbon::parse($expires, $tz);
    }

    /**
     * Days.
     *
     * @return string
     */
    public function days()
    {
        return sprintf('%02d', $this->difference()->d);
    }

    /**
     * Hours.
     *
     * @return string
     */
    public function hours()
    {
        return sprintf('%02d', $this->difference()->h);
    }

    /**
     * Minutes.
     *
     * @return string
     */
    public function minutes()
    {
        return sprintf('%02d', $this->difference()->i);
    }

    /**
     * Seconds.
     *
     * @return string
     */
    public function seconds()
    {
        return sprintf('%02d', $this->difference()->s);
    }

    /**
     * Difference.
     *
     * @return DateInterval
     */
    public function difference()
    {
        return $this->expires->diff(now());
    }
}
