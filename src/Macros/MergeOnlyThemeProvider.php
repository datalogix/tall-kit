<?php

namespace TALLKit\Macros;

class MergeOnlyThemeProvider
{
    public function __invoke()
    {
        return function ($themeProvider, $themeKey = null, $subkey = null) {
            if (is_null($themeKey)) {
                return $this;
            }

            return $this->whereStartsWith("theme:$themeKey")
                ->mergeThemeProvider($themeProvider, $themeKey, $subkey);
        };
    }
}
