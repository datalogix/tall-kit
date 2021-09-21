<?php

namespace TALLKit\Components\Datetimes;

use Carbon\CarbonInterface;
use DateTimeInterface;
use Illuminate\Support\Carbon as CarbonAlias;
use TALLKit\Components\BladeComponent;

class Carbon extends BladeComponent
{
    /**
     * @var CarbonInterface
     */
    public $date;

    /**
     * @var string
     */
    public $format;

    /**
     * @var bool
     */
    public $human;

    /**
     * @var string|null
     */
    public $local;

    /**
     * Create a new component instance.
     *
     * @param  string|DateTimeInterface|null  $date
     * @param  DateTimeZone|string|null  $tz
     * @param  string  $format
     * @param  bool  $human
     * @param  string|null  $local
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $date = null,
        $tz = null,
        $format = 'Y-m-d H:i:s',
        $human = false,
        $local = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->date = CarbonAlias::parse($date, $tz);
        $this->format = $format;
        $this->human = $human;
        $this->local = $local;
    }
}
