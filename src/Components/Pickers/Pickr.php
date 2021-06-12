<?php

namespace TALLKit\Components\Pickers;

use TALLKit\Components\Forms\Input;

class Pickr extends Input
{
    /**
     * @var array
     */
    public $options;

    /**
     * @var array
     */
    public $swatches;

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
     * @param  string|null  $theme,
     * @param  array  $options
     * @param  array  $swatches
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
        $options = [],
        $swatches = []
    ) {
        parent::__construct(
            $name,
            $id,
            $label,
            'hidden',
            $bind,
            $default,
            false,
            $language,
            $showErrors,
            $theme
        );

        $this->options = $options;
        $this->swatches = $swatches;
    }

    /**
     * Json options.
     *
     * @return string
     */
    public function jsonOptions()
    {
        return json_encode((object) array_merge([
            'default' => $this->value,
            'theme' => 'classic',
            'swatches' => $this->swatchesOptions(),
            'components' => $this->componentsOptions(),
        ], $this->options));
    }

    /**
     * Swatches options.
     *
     * @return array
     */
    public function swatchesOptions()
    {
        return array_merge([
            '000000',
            'A0AEC0',
            'F56565',
            'ED8936',
            'ECC94B',
            '48BB78',
            '38B2AC',
            '4299E1',
            '667EEA',
            '9F7AEA',
            'ED64A6',
            'FFFFFF',
        ], $this->swatches);
    }

    /**
     * Components options.
     *
     * @return array
     */
    public function componentsOptions()
    {
        return [
            'preview' => true,
            'interaction' => [
                'hex' => true,
                'input' => true,
                'clear' => true,
                'save' => true,
            ],
        ];
    }
}
