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

            $themeAttrs = Collection::wrap($this->whereStartsWith('theme:'))
                ->mapWithKeys(function ($value, $key) {
                    return [Str::replace('theme:', '', $key) => MergeThemeProvider::convertStringToArrayClass($value)];
                })->get($themeKey, []);

            $exceptAttrs = Collection::wrap($this->whereStartsWith('theme:'.$themeKey.'.except.'))
                ->filter(function ($value) {
                    return $value !== false;
                })->map(function ($value, $key) use ($themeKey) {
                    return Str::replace('theme:'.$themeKey.'.except.', '', $key);
                })->all();

            $subkeyAttrs = new ComponentAttributeBag();

            if ($subkey) {
                $subkeyAttrs = $subkeyAttrs->merge($themeProvider->$themeKey->get($subkey, []), false);

                if (is_array($themeAttrs) && array_key_exists($subkey, $themeAttrs)) {
                    $subkeyAttrs = $subkeyAttrs->merge(MergeThemeProvider::convertStringToArrayClass($themeAttrs[$subkey]), false);
                }
            } else {
                $subkeyAttrs = $subkeyAttrs->merge(MergeThemeProvider::mergeRecursiveClass(
                    MergeThemeProvider::convertStringToArrayClass($themeProvider->$themeKey->except($exceptAttrs)->getAttributes()),
                    $themeAttrs
                ), false);
            }

            return $this->whereDoesntStartWith('theme:')->merge(
                $subkeyAttrs->getAttributes(),
                false
            );
        };
    }

    public static function convertStringToArrayClass($value)
    {
        if (is_array($value)) {
            $newValue = [];

            foreach ($value as $k => $v) {
                $newValue[$k] = Str::startsWith($k, 'theme:')
                    ? static::convertStringToArrayClass($v)
                    : $v;
            }

            return $newValue;
        }

        if (is_string($value)) {
            return ['class' => $value];
        }

        return [];
    }

    public static function mergeRecursiveClass(array $arr1, array $arr2)
    {
        $result = $arr2;

        foreach ($arr1 as $k => $v) {
            if (! array_key_exists($k, $arr2)) {
                $result[$k] = $v;

                continue;
            }

            if (is_array($v)) {
                $result[$k] = static::mergeRecursiveClass($v, is_array($arr2[$k]) ? $arr2[$k] : []);

                continue;
            }

            $result[$k] = (new ComponentAttributeBag([$k => $v]))->merge([$k => $arr2[$k]], false)->get($k);
        }

        return $result;
    }
}
