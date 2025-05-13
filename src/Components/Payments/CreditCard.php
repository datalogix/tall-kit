<?php

namespace TALLKit\Components\Payments;

use TALLKit\Concerns\JsonOptions;
use TALLKit\View\BladeComponent;

class CreditCard extends BladeComponent
{
    use CardTypes;
    use JsonOptions;

    protected function props(): array
    {
        return [
            'options' => null,
            'openned' => true,
            'types' => $this->getCardTypes(),
            'holderName' => null,
            'number' => null,
            'type' => null,
            'expirationDate' => null,
            'cvv' => null,
        ];
    }

    protected function processed(array $data)
    {
        $this->setOptions(array_replace_recursive([
            'openned' => $this->openned,
            'types' => $this->types,
            'holderName' => $this->holderName,
            'number' => $this->number,
            'type' => $this->type,
            'expirationDate' => $this->expirationDate,
            'cvv' => $this->cvv,
        ], $this->options ?? []));
    }

    protected function attrs()
    {
        return [
            'root' => [
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'credit-card\')',
                'class' => 'relative mx-auto max-w-[400px] h-[260px] w-full cursor-pointer transition duration-700 text-gray-700',
                ':style' => 'style()',
                '@click' => 'toggle',
                'x-init' => 'setup('.$this->jsonOptions().')'
            ],

            'front' => [
                'class' => 'absolute w-full',
                'style' => 'backface-visibility: hidden;',
            ],

            'front-svg' => [
                'class' => 'w-full rounded-3xl shadow-lg shadow-black',
                'viewBox' => '0 0 750 471',
            ],

            'back' => [
                'class' => 'absolute w-full',
                'style' => 'backface-visibility: hidden; transform: rotateY(180deg);',
            ],

            'back-svg' => [
                'class' => 'w-full rounded-3xl shadow-lg shadow-black',
                'viewBox' => '0 0 750 471',
            ],

            'icon' => [
                'class' => 'absolute right-4 top-5 w-20 h-14 flex',
                'x-html' => 'typeOptions.icon',
            ],
        ];
    }
}
