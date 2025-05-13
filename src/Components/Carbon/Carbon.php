<?php

namespace TALLKit\Components\Carbon;

use Illuminate\Support\Carbon as CarbonAlias;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Carbon extends BladeComponent
{
    protected array $props = [
        'date' => null,
        'tz' => null,
        'format' => 'm/d/Y H:i:s',
        'human' => false,
        'local' => null,
    ];

    protected function processed($data)
    {
        $this->date = CarbonAlias::parse($this->date, $this->tz);
    }

    protected function attrs()
    {
        if (is_null($this->local)) {
            return [];
        }

        return [
            'root' => Attr::make(
                attributes: ['wire:ignore' => ''],
                component: 'carbon',
                setup: [$this->date->timestamp, ($this->local !== true ? $this->local : 'DD-MM-YYYY HH:mm:ss (z)')]
            ),
        ];
    }
}
