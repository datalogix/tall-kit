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
     * @param  string|null  $format
     * @param  bool|null  $human
     * @param  string|null  $local
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $date = null,
        $tz = null,
        $format = null,
        $human = null,
        $local = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->date = CarbonAlias::parse($date, $tz);
        $this->format = $format ?? 'd/m/Y H:i:s';
        $this->human = $human ?? false;
        $this->local = $local;
    }
}
