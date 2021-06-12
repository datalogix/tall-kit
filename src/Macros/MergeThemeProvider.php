<?php

namespace TALLKit\Macros;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

class MergeThemeProvider
{
    public function __invoke()
    {
        return function ($themeProvider, $themeKey = null, $subkey = null) {
            if (is_null($themeKey)) {
                return $this;
            }

            $themeAttrs = Collection::make($this->whereStartsWith('theme:'))->mapWithKeys(function ($value, $key) {
                return [Str::replace('theme:', '', $key) => is_array($value) ? $value : ['class' => $value]];
            })->get($themeKey, []);

            $subkeyAttrs = $subkey ? new ComponentAttributeBag() : $themeProvider->$themeKey->merge($themeAttrs);

            if ($subkey) {
                $subkeyAttrs = $subkeyAttrs->merge($themeProvider->$themeKey->get($subkey, []));

                if (is_array($themeAttrs) && array_key_exists($subkey, $themeAttrs)) {
                    if (is_array($themeAttrs[$subkey])) {
                        $subkeyAttrs = $subkeyAttrs->merge($themeAttrs[$subkey]);
                    } elseif (is_string($themeAttrs[$subkey])) {
                        $subkeyAttrs = $subkeyAttrs->merge(['class' => $themeAttrs[$subkey]]);
                    }
                }
            }

            return $this->whereDoesntStartWith('theme:')->merge(
                $subkeyAttrs->getAttributes(),
                false
            );
        };
    }
}
