<?php

namespace TALLKit\Components\Pickr;

use TALLKit\Components\Forms\Input;
use TALLKit\Concerns\JsonOptions;

class Pickr extends Input
{
    use JsonOptions;

    protected function props(): array
    {
        return array_merge(parent::props(), [
            'type' => 'hidden',
            'options' => [
                // See https://github.com/Simonwep/pickr#options
                'theme' => 'classic',

                'swatches' => [
                    '000000',
                    'A0AEC0',
                    'F56565',
                    'ED8936',
                    'ECC94B',
                    '48BB78',
                    '38B2AC',
                    '4299E1',
                    '667EEA',
                    '9F7AEA',
                    'ED64A6',
                    'FFFFFF',
                ],

                'components' => [
                    'preview' => true,
                    'interaction' => [
                        'hex' => true,
                        'input' => true,
                        'clear' => true,
                        'save' => true,
                    ],
                ],
            ]
        ]);
    }

    protected function attrs()
    {
        return [
            'root' => [
                'wire:ignore' => '',
                'x-data' => 'window.tallkit.component(\'pickr\')',
                'x-init' => 'setup('.$this->jsonOptions().')',

                'name' => $this->name,
                'label' => $this->label,
                'showErrors' => $this->showErrors,
                'value' => $this->value,
            ],

            'input' => [
                'x-ref' => 'input',
                'type' => 'hidden',
                'name' => $this->name,
                'id' => $this->id,
                'modifier' => $this->name,
            ],

            'pickr' => [
                'x-ref' => 'picker',
            ],
        ];
    }

    protected function getOptionsValues()
    {
        return ['default' => $this->value];
    }
}
