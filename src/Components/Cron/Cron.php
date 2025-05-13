<?php

namespace TALLKit\Components\Cron;

use Lorisleiva\CronTranslator\CronTranslator;
use TALLKit\View\BladeComponent;

class Cron extends BladeComponent
{
    protected function props(): array
    {
        return [
            'value' => null,
            'locale' => app()->getLocale(),
            'use24hour' => false,
            'human' => false,
        ];
    }

    /**
     * Translate.
     *
     * @param  string  $cron
     * @return string
     */
    public function translate($cron)
    {
        return CronTranslator::translate($cron, $this->locale, $this->use24hour);
    }
}
