<?php

namespace TALLKit\Components\Layouts;

use Illuminate\Database\Eloquent\Model;
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

        $value = $value ?? data_get($target, $key.'_formatted', data_get($target, $key.'_url', data_get($target, $key)));

        // Model - Relation
        if ($value instanceof Model) {
            $value = data_get($value, 'name', data_get($value, 'title', data_get($value, 'text')));
        }

        // Storage
        if (
            is_string($value)
            && ! filter_var($value, FILTER_VALIDATE_IP)
            && ! filter_var($value, FILTER_VALIDATE_MAC)
            && ! filter_var($value, FILTER_VALIDATE_URL)
            && ! filter_var($value, FILTER_VALIDATE_EMAIL)
            && ! filter_var($value, FILTER_VALIDATE_DOMAIN)
            && pathinfo($value, PATHINFO_EXTENSION)
            && Storage::exists($value)
        ) {
            $value = Storage::url($value);
        }

        $this->value = $value;
    }
}
