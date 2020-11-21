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
     * The Pickr options.
     *
     * @var array
     */
    protected $options;

    /**
     * The Pickr swatches.
     *
     * @var array
     */
    protected $swatches;

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

        $this->options = $options;
        $this->swatches = $swatches;
    }

    /**
     * Convert array options to string.
     *
     * @return string
     */
    public function jsonOptions()
    {
        $options = array_merge([
            'el' => '#'.$this->id,
            'default' => $this->value,
            'theme' => 'classic',
            'swatches' => $this->swatches(),
            'components' => [
                'preview' => true,
                'interaction' => [
                    'hex' => true,
                    'input' => true,
                    'clear' => true,
                    'save' => true,
                ],
            ],
        ], $this->options);

        return json_encode((object) $options);
    }

    /**
     * Get Pickr swatches.
     *
     * @return array
     */
    protected function swatches()
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
}
