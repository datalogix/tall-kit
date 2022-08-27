<?php

namespace TALLKit\Components\Layouts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
     * @param  mixed  $bind
     * @param  mixed  $name
     * @param  mixed  $default
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $value = null,
        $bind = null,
        $name = null,
        $default = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $value = $value ?? target_get($bind, [$name.'_formatted', $name.'_url', $name], $default);

        // Remove _id for relation
        if (Str::endsWith($name, '_id')) {
            $value = target_get($bind, Str::replaceLast('_id', '', $name));
        }

        // Model - Relation
        if ($value instanceof Model) {
            $value = target_get($value, ['name', 'title', 'text']);
        }

        // Storage
        if (
            is_string($value)
            && ! filter_var($value, FILTER_VALIDATE_IP)
            && ! filter_var($value, FILTER_VALIDATE_MAC)
            && ! filter_var($value, FILTER_VALIDATE_URL)
            && ! filter_var($value, FILTER_VALIDATE_EMAIL)
            && ! filter_var($value, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME)
            && pathinfo($value, PATHINFO_EXTENSION)
            && Storage::exists($value)
        ) {
            $value = Storage::url($value);
        }

        // Date | DateTime
        if ($value instanceof Carbon) {
            $value = $value->format($value->toTimeString() === '00:00:00' ? 'd/m/Y' : 'd/m/Y H:i:s');
        }

        $this->value = $value;
    }
}
