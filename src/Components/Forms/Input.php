<?php

namespace Datalogix\TALLKit\Components\Forms;

use Datalogix\TALLKit\Components\BladeComponent;
use Datalogix\TALLKit\Concerns\DefaultAndOldValue;
use Datalogix\TALLKit\Concerns\LabelText;
use Datalogix\TALLKit\Concerns\ValidationErrors;
use Illuminate\Support\Str;

class Input extends BladeComponent
{
    use DefaultAndOldValue;
    use LabelText;
    use ValidationErrors;

    /**
     * The assets of component.
     *
     * @var array
     */
    protected static $assets = [
        'alpine',
        'inputmask',
    ];

    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * The input id.
     *
     * @var string|bool|null
     */
    public $id;

    /**
     * The input type.
     *
     * @var string|null
     */
    public $type;

    /**
     * The input value.
     *
     * @var mixed
     */
    public $value;

    /**
     * The input mask.
     *
     * @var mixed
     */
    public $mask;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|bool|null  $id
     * @param  string|bool|null  $label
     * @param  string|null  $type
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  mixed  $mask
     * @param  string|null  $language
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name,
        $id = null,
        $label = '',
        $type = null,
        $bind = null,
        $default = null,
        $mask = null,
        $language = null,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setLabel($name, $label);

        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type ?: $this->getTypeByName($name);
        $this->showErrors = $showErrors;
        $this->mask = $mask ?? $this->getMaskByName($name, $language);

        if ($language) {
            $this->name = "{$name}[{$language}]";
        }

        if ($this->type !== 'password') {
            $this->setValue($name, $bind, $default, $language);
        }

        $this->themeProvider->input = $this->themeProvider->input
            ->merge($this->themeProvider->types->get($type, []), false)
            ->merge($mask ? ['x-init' => 'initMask($el, '.$this->maskOptions().')'] : [], false);
    }

    /**
     * Input mask options.
     *
     * @return string
     */
    protected function maskOptions()
    {
        if (is_string($this->mask)) {
            return $this->mask;
        }

        return json_encode((object) $this->mask);
    }

    /**
     * Get input type by name.
     *
     * @param  string  $name
     * @return string
     */
    protected function getTypeByName($name)
    {
        $types = [
            'color' => ['color'],
            'date' => ['date', 'birthdate', 'birth_date', '_at'],
            'datetime-local' => ['datetime', 'date_time'],
            'email' => ['email'],
            'file' => ['image', 'picture', 'photo', 'logo', 'background', 'audio', 'video', 'file'],
            'password' => ['password', 'password_confirmation', 'new_password', 'new_password_confirmation'],
            'url' => ['url', 'website', 'youtube', 'vimeo', 'facebook', 'twitter', 'instagram', 'linkedin'],
            'time' => ['time'],
        ];

        foreach ($types as $type => $names) {
            if (Str::contains($name, $names)) {
                return $type;
            }
        }

        return 'text';
    }

    /**
     * Get input mask by name.
     *
     * @param  string  $name
     * @param  string|null  $language
     * @return mixed
     */
    protected function getMaskByName($name, $language = null)
    {
        $masksWithoutLocale = [
            'decimal' => ['decimal'],
            'email' => ['email'],
            'ip' => ['ip', 'remote_address', 'remote_address_ip', 'remote_ip'],
            'url' => ['url', 'website', 'youtube', 'vimeo', 'facebook', 'twitter', 'instagram', 'linkedin'],
        ];

        $masksWithLocale = [
            'date' => ['date', 'birthdate', 'birth_date', '_at'],
            'datetime' => ['datetime', 'date_time'],
            'phone' => ['phone', 'cell', 'cellphone', 'cell_phone'],
            'price' => ['price', 'money'],
            'time' => ['time'],
            'weight' => ['weight'],
            'zipcode' => ['zipcode', 'zip_code', 'postal', 'postalcode', 'postal_code'],
        ];

        foreach ($masksWithoutLocale as $mask => $names) {
            if (Str::contains($name, $names)) {
                return ['alias' => $mask];
            }
        }

        $language = $language ?? app()->getLocale();

        foreach ($masksWithLocale as $mask => $names) {
            if (Str::contains($name, $names)) {
                return ['alias' => $mask.'_'.$language];
            }
        }

        return false;
    }
}
