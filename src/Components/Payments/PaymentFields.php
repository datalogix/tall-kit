<?php

namespace TALLKit\Components\Payments;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use TALLKit\Concerns\JsonOptions;
use TALLKit\View\BladeComponent;

class PaymentFields extends BladeComponent
{
    use CardTypes;
    use JsonOptions;

    protected function props(): array
    {
        return [
            'options' => null,
            'cardTypes' => $this->getCardTypes(),
            'displayCreditCard' => true,
            'displayCardIcon' => true,
            'displayCardExpirationDate' => false,
            'cardExpirationMaxYears' => 10,
            'cardExpirationMonths' => $this->getCardExpirationMonths(),
            'cardExpirationYears' => $this->getCardExpirationYears(),
        ];
    }

    protected function processed(array $data)
    {
        $this->setOptions(array_replace_recursive([
            'cardTypes' => $this->cardTypes,
            'displayCreditCard' => $this->displayCreditCard,
            'displayCardIcon' => $this->displayCardIcon,
            'displayCardExpirationDate' => $this->displayCardExpirationDate,
            'cardExpirationMaxYears' => $this->cardExpirationMaxYears,
        ], $this->options ?? []));
    }

    protected function getCardExpirationMonths()
    {
        return Collection::make(range(1, 12))
            ->mapWithKeys(fn ($value) => [Str::padLeft($value, 2, '0') => Str::padLeft($value, 2, '0')])
            ->toArray();
    }

    protected function getCardExpirationYears()
    {
        return Collection::make(range(intval(date('Y')), intval(date('Y') + $this->getOptions('cardExpirationMaxYears'))))
            ->mapWithKeys(fn ($value) => [$value => $value])
            ->toArray();
    }

    protected function attrs()
    {
        return [
            'root' => [
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'payment-fields\')',
                'class' => 'grid grid-cols-1 lg:grid-cols-2 gap-10 items-center',
                'x-init' => 'setup('.$this->jsonOptions().')'
            ],

            'credit-card' => [],

            'fields' => [],

            'only-form' => [
                'class' => 'lg:col-span-2',
            ],

            'card-holder-name' => [
                'maxlength' => '20',
                'x-ref' => 'cardHolderName',
                '@keyup' => 'change',
                '@focus' => 'focus',
                'required'=> true,
                'name'=> 'card_holder_name',
                'maxlength' => 50,
            ],

            'card-number' => [
                'x-ref' => 'cardNumber',
                '@focus' => 'focus',
                'required'=> true,
                'name'=> 'card_number',
                'maxlength' => 20,

                'pt' => [
                    'root' => [
                        'pt' => [
                            'field-group' => [
                                'pt' => [
                                    'append' => [
                                        'class' => '!p-1',
                                        'style' => 'padding: 0.25rem;',
                                        'x-show' => 'cardIcon && options.displayCardIcon',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],

            'card-icon' => [
                'class' => 'w-12 h-8 flex place-content-center',
                'x-html' => 'cardIcon',
            ],

            'card-group' => [
                'class' => 'sm:grid-cols-2 !gap-4',
                'style' => 'gap: 1rem;',
                'grid' => 1,
            ],

            'card-expiration-date' => [
                'x-ref' => 'cardExpirationDate',
                '@focus' => 'focus',
                'required'=> true,
                'type' => 'text',
                'name'=> 'card_expiration_date',
                'maxlength' => 7,
            ],

            'card-expiration-date-group' => [
                'class' => '!space-x-2 !flex-nowrap items-center',
                'label' => 'card_expiration_date',
                'inline' => true,
            ],

            'card-expiration-month' => [
                'x-ref' => 'cardExpirationMonth',
                'theme:container' => 'flex-1 !mb-0',
                '@change' => 'change',
                '@focus' => 'focus',
                'required'=> true,
                'name'=> 'card_expiration_month',
                'label' => false,
                'options' => $this->cardExpirationMonths
            ],

            'card-expiration-year' => [
                'x-ref' => 'cardExpirationYear',
                'theme:container' => 'flex-1 !mb-0',
                '@change' => 'change',
                '@focus' => 'focus',
                'required'=> true,
                'name'=> 'card_expiration_year',
                'label' => false,
                'options' => $this->cardExpirationYears
            ],

            'card-cvv' => [
                'x-ref' => 'cardCVV',
                '@change' => 'change',
                '@focus' => 'focus',
                'required'=> true,
                'name'=> 'card_cvv',
                'maxlength' => 4,
            ],
        ];
    }
}
