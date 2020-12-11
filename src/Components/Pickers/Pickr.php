<?php

namespace Datalogix\TALLKit\Components\Pickers;

use Datalogix\TALLKit\Components\Forms\Input;

class Pickr extends Input
{
    /**
     * The assets of component.
     *
     * @var array
     */
    protected static $assets = [
        'alpine',
        'pickr',
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
            $id ?: $name,
            $label,
            'hidden',
            $bind,
            $default,
            false,
            $language,
            $showErrors,
            $theme
        );

        $jsonOptions = json_encode((object) array_merge([
            'el' => '#'.$this->id,
            'default' => $this->value,
            'theme' => 'classic',
            'swatches' => array_merge([
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
            ], $swatches),
            'components' => [
                'preview' => true,
                'interaction' => [
                    'hex' => true,
                    'input' => true,
                    'clear' => true,
                    'save' => true,
                ],
            ],
        ], $options));

        $this->themeProvider->container = $this->themeProvider->container->merge([
            'x-init' => 'initPickr($el, "'.$this->id.'-input", '.$jsonOptions.')',
            'title' => $this->value,
        ], false);
    }
}
