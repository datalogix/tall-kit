<?php

namespace TALLKit\Components\Forms;

use TALLKit\View\BladeComponent;

class FormSteps extends BladeComponent
{
    protected array $props = [
        'mode' => 'horizontal',
        'steps' => [],
        'current' => 1
    ];

    protected function processed(array $data)
    {
        $this->steps = collect($this->steps)->map(function(&$step, $pos) {
            data_set($step, 'label', target_get($step, ['label', 'position', 'number'], intval($pos) + 1));
            data_set($step, 'title', target_get($step, ['title', 'name']));
            data_set($step, 'subtitle', target_get($step, ['subtitle', 'text']));
            data_set($step, 'icon', target_get($step, 'icon'));
            data_set($step, 'active', $pos === $this->current - 1);
            data_set($step, 'completed', $pos < $this->current - 1);
            data_set($step, 'uncompleted', $pos > $this->current - 1);

            return $step;
        });
    }

    protected function attrs()
    {
        return [
            'horizontal' => [
                'class' => 'flex justify-space-between form-steps-horizontal text-center',
            ],

            'vertical' => [
                'class' => 'flex justify-space-between form-steps-vertical flex-col space-y-10',
            ],

            'step' => [
                'mode' => $this->mode
            ],
        ];
    }
}
