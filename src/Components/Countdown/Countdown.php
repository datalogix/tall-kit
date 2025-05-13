<?php

namespace TALLKit\Components\Countdown;

use Illuminate\Support\Carbon;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Countdown extends BladeComponent
{
    // TODO: review (display days?)

    protected array $props = [
        'date' => null,
        'tz' => null,
    ];

    protected function processed($data)
    {
        $this->date = Carbon::parse($this->date, $this->tz);
        $this->difference = $this->date->diff(now());
        $this->setVariables('difference');
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: ['wire:ignore' => ''],
                component: 'countdown',
                setup: [$this->date->timestamp]
            )->cloak(false),

            'days' => Attr::make(
                class: 'mx-px',
                attributes: ['x-ref' => 'days']
            ),

            'hours' => Attr::make(
                class: 'mx-px',
                attributes: ['x-ref' => 'hours']
            ),

            'minutes' => Attr::make(
                class: 'mx-px',
                attributes: ['x-ref' => 'minutes']
            ),

            'seconds' => Attr::make(
                class: 'mx-px',
                attributes: ['x-ref' => 'seconds']
            )
        ];
    }
}
