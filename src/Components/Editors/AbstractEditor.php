<?php

namespace TALLKit\Components\Editors;

use TALLKit\Components\Forms\Textarea;
use TALLKit\Concerns\JsonOptions;

abstract class AbstractEditor extends Textarea
{
    use JsonOptions;

    /**
     * @var string|null
     */
    public $provider;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $provider
     * @param  string|null  $name
     * @param  string|null  $id
     * @param  string|bool|null  $label
     * @param  mixed  $bind
     * @param  string|null  $modifier
     * @param  mixed  $default
     * @param  string|bool|null  $language
     * @param  bool|null  $showErrors
     * @param  mixed  $options
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $provider = null,
        $name = null,
        $id = null,
        $label = null,
        $bind = null,
        $modifier = null,
        $default = null,
        $language = null,
        $showErrors = null,
        $options = null,
        $theme = null
    ) {
        $this->provider = $provider;

        parent::__construct(
            $name,
            $id,
            $label,
            $bind,
            $modifier,
            $default,
            $language,
            $showErrors,
            $theme,
            false
        );

        $this->setOptions($options);
    }
}
