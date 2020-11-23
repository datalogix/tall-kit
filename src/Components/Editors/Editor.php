<?php

namespace Datalogix\TALLKit\Components\Editors;

use Datalogix\TALLKit\Components\Forms\Textarea;

abstract class Editor extends Textarea
{
    /**
     * The editor options.
     *
     * @var array
     */
    public $options;

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
     * @param  array  $options
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
        $theme = null,
        $options = []
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

        $this->options = $options;
    }
}
