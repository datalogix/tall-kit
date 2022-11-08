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

    /**
     * Create a new component instance.
     *
     * @param  mixed  $options
     * @param  bool|null  $displayCreditCard
     * @param  bool|null  $displayCardIcon
     * @param  bool|null  $displayCardIcon
     * @param  bool|null  $displayCardExpirationDate
     * @param  int|null  $cardExpirationMaxYears
     * @param  array|null  $cardExpirationMonths
     * @param  array|null  $cardExpirationYears
     * @param  string|null  $theme
     * @return void
     */
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

    /**
     * Get card expiration months.
     *
     * @return array
     */
    protected function getCardExpirationMonths()
    {
        return Collection::make(range(1, 12))
            ->mapWithKeys(function ($value) {
                return [Str::padLeft($value, 2, '0') => Str::padLeft($value, 2, '0')];
            })
            ->toArray();
    }

    /**
     * Get card expiration years.
     *
     * @return array
     */
    protected function getCardExpirationYears()
    {
        return Collection::make(range(intval(date('Y')), intval(date('Y') + $this->getOptions('cardExpirationMaxYears'))))
            ->mapWithKeys(function ($value) {
                return [$value => $value];
            })->toArray();
    }
}
