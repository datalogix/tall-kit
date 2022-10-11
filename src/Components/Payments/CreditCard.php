<?php

namespace TALLKit\Components\Payments;

use TALLKit\Components\BladeComponent;
use TALLKit\Concerns\JsonOptions;

class CreditCard extends BladeComponent
{
    use JsonOptions;

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
            'openned' => $openned,
            'types' => config('tallkit.options.card_types'),
            'holderName' => $holderName,
            'number' => $number,
            'type' => $type,
            'expirationDate' => $expirationDate,
            'cvv' => $cvv,
        ], $options ?? []));
    }
}
