<?php

namespace TALLKit\Macros;

class MergeOnlyThemeProvider
{
    public function __invoke()
    {
        return function ($themeProvider, $themeKey = null, $subkey = null, $merge = true) {
            if (is_null($themeKey)) {
                return $this;
            }

            //dd($themeKey, $this->attributes);

            $attrs = $this->only(["pt", 'th1eme'])
                ->mergeThemeProvider($themeProvider, $themeKey, $subkey, false);

            return $subkey && $merge
                ? $this->merge($attrs->getAttributes(), false)
                : $attrs;
        };
    }
}
