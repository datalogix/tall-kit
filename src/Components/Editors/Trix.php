<?php

namespace Datalogix\TALLKit\Components\Editors;

use Datalogix\TALLKit\Components\Forms\Textarea;

class Trix extends Textarea
{
    /**
     * The assets of component.
     *
     * @var array
     */
    protected static $assets = [
        'trix',
    ];

    /**
     * Create a new component instance.
     *
     * @param  string  $name
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
        $name,
        $id = null,
        $label = '',
        $bind = null,
        $default = null,
        $language = null,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct(
            $name,
            $id ?: $name,
            $label,
            $bind,
            $default,
            $language,
            $showErrors,
            $theme
        );
    }
}
