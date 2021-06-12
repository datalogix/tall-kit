<?php

namespace TALLKit\Components\Editors;

use TALLKit\Components\Forms\Textarea;

class EasyMDE extends Textarea
{
    /**
     * @var array
     */
    public $options;

    /**
     * @var string
     */
    protected $componentKey = 'easymde';

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
            $id,
            $label,
            $bind,
            $default,
            $language,
            $showErrors,
            $theme
        );

        $this->options = $options;
    }

    /**
     * Json options.
     *
     * @return string
     */
    public function jsonOptions()
    {
        return json_encode((object) array_merge([
            'forceSync' => true,
        ], $this->options));
    }
}
