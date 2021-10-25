<?php

namespace TALLKit\Components\Layouts;

use Illuminate\Support\Facades\Storage;
use TALLKit\Components\BladeComponent;

class Display extends BladeComponent
{
    /**
     * @var mixed
     */
    public $value;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $value
     * @param  mixed  $target
     * @param  mixed  $key
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $value = null,
        $target = null,
        $key = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $value = $value ?? data_get($target, $key.'_formatted', data_get($target, $key));

        if (
            is_string($value)
            && ! filter_var($value, FILTER_VALIDATE_URL)
            && pathinfo($value, PATHINFO_EXTENSION)
            && Storage::exists($value)
        ) {
            $value = Storage::url($value);
        }

        $this->value = $value;
    }
}
