<?php

namespace TALLKit\Components\Payments;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\JsonOptions;

class CreditCard extends BladeComponent
{
    use JsonOptions;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $options
     * @param  bool|null  $openned
     * @param  string|null  $holderName
     * @param  string|int|null  $number
     * @param  string|null  $type
     * @param  string|null  $expirationDate
     * @param  string|int|null  $cvv
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = null,
        $openned = null,
        $holderName = null,
        $number = null,
        $type = null,
        $expirationDate = null,
        $cvv = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setOptions(array_replace_recursive([
            'openned' => $openned ?? true,
            'types' => config('tallkit.options.card_types'),
            'holderName' => $holderName,
            'number' => $number,
            'type' => $type,
            'expirationDate' => $expirationDate,
            'cvv' => $cvv,
        ], $options ?? []));
    }
}
