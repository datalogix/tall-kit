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

            $exceptAttrs = Collection::make($this->whereStartsWith('theme:'.$themeKey.'.except.'))->filter(function($value) {
                return $value !== false;
            })->map(function ($value, $key) use ($themeKey) {
                return Str::replace('theme:'.$themeKey.'.except.', '', $key);
            })->all();

            $subkeyAttrs = new ComponentAttributeBag();

            if ($subkey) {
                $subkeyAttrs = $subkeyAttrs->merge($themeProvider->$themeKey->get($subkey, []));

                if (is_array($themeAttrs) && array_key_exists($subkey, $themeAttrs)) {
                    if (is_array($themeAttrs[$subkey])) {
                        $subkeyAttrs = $subkeyAttrs->merge($themeAttrs[$subkey]);
                    } elseif (is_string($themeAttrs[$subkey])) {
                        $subkeyAttrs = $subkeyAttrs->merge(['class' => $themeAttrs[$subkey]]);
                    }
                }
            } else {
                $subkeyAttrs = $subkeyAttrs->merge($themeAttrs, false)->merge(
                    $themeProvider->$themeKey->except($exceptAttrs)->getAttributes(),
                    false
                );
            }

            return $this->whereDoesntStartWith('theme:')->merge(
                $subkeyAttrs->getAttributes(),
                false
            );
        };
    }
}
