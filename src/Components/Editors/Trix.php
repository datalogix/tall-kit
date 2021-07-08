<?php

namespace TALLKit\Components\Editors;

use Illuminate\Support\Str;
use TALLKit\Components\Forms\Textarea;

class Trix extends Textarea
{
    /**
     * Create a new component instance.
     *
     * @param  string|null  $name
     * @param  string|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  string|null  $language
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $id = null,
        $label = null,
        $bind = null,
        $default = null,
        $language = null,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $id ?: $name ?: Str::random(),
            $label,
            $bind,
            $default,
            $language,
            $showErrors,
            $theme,
            false
        );
    }
}
