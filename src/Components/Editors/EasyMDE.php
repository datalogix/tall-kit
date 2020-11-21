<?php

namespace Datalogix\TALLKit\Components\Editors;

use Datalogix\TALLKit\Components\Forms\Textarea;

class EasyMDE extends Textarea
{
    /**
     * The assets of component.
     *
     * @var array
     */
    protected static $assets = [
        'alpine',
        'easy-mde',
    ];

    /**
     * The EasyMDE options.
     *
     * @var array
     */
    protected $options;

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
            'hidden',
            $bind,
            $default,
            $language,
            $showErrors,
            $theme
        );

        $this->options = $options;
    }

    /**
     * Convert array options to string.
     *
     * @return string
     */
    public function jsonOptions()
    {
        $options = array_merge([
            'forceSync' => true,
        ], $this->options);

        return ', ...'.json_encode((object) $options);
    }
}
