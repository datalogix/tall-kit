<?php

namespace TALLKit\Components\Payments;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\JsonOptions;

class PaymentFields extends BladeComponent
{
    use JsonOptions;

    public $cardExpirationMonths;
    public $cardExpirationYears;

    public function __construct(
        $options = null,
        $displayCreditCard = null,
        $displayCardIcon = null,
        $displayCardExpirationDate = null,
        $cardExpirationMaxYears = null,
        $cardExpirationMonths = null,
        $cardExpirationYears = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setOptions(array_replace_recursive([
            'displayCreditCard' => $displayCreditCard,
            'displayCardIcon' => $displayCardIcon,
            'displayCardExpirationDate' => $displayCardExpirationDate,
            'cardTypes' => config('tallkit.options.card_types'),
            'cardExpirationMaxYears' => $cardExpirationMaxYears,
        ], $options ?? []));

        $this->cardExpirationMonths = $cardExpirationMonths ?? $this->getCardExpirationMonths();
        $this->cardExpirationYears = $cardExpirationYears ?? $this->getCardExpirationYears();
    }

    protected function getCardExpirationMonths()
    {
        return Collection::wrap(range(1, 12))
            ->mapWithKeys(function ($value) {
                [Str::padLeft($value, 2, '0') => Str::padLeft($value, 2, '0')];
            })
            ->toArray();
    }

    protected function getCardExpirationYears()
    {
        return Collection::wrap(range(intval(date('Y')), intval(date('Y') + $this->getOptions('cardExpirationMaxYears'))))
            ->mapWithKeys(function ($value) {
                return [$value => $value];
            })->toArray();
    }
}
