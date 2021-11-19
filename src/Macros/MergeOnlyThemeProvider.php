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

            $attrs = $this->whereStartsWith("theme:$themeKey")
                ->mergeThemeProvider($themeProvider, $themeKey, $subkey, false);

            return $subkey && $merge
                ? $this->merge($attrs->getAttributes(), false)
                : $attrs;
        };
    }
}
