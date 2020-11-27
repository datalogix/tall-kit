<?php

use Illuminate\View\ComponentAttributeBag;

if (! function_exists('toArray')) {
    function toArray($value) {
        if ($value instanceof ComponentAttributeBag) {
            return $value->getIterator()->getArrayCopy();
        }

        if (is_array($value)) {
            return $value;
        }

        return [$value];
    }
}
