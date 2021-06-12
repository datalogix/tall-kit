<?php

namespace TALLKit\Components\Forms;

use Illuminate\Support\Str;
use TALLKit\Concerns\DefaultAndOldValue;

class Input extends Field
{
    use DefaultAndOldValue;

    /**
     * @var string|bool|null
     */
    public $id;

    /**
     * @var string|null
     */
    public $type;

    /**
     * @var mixed
     */
    public $value;

    /**
     * @var mixed
     */
    protected $mask;

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
        parent::__construct($name, $label, $showErrors, $theme);

        $this->id = $id ?? $this->name;
        $this->type = $type ?: $this->getTypeByName($this->name);

        if ($language) {
            $this->name = "{$this->name}[{$language}]";
        }

        if ($this->type !== 'password') {
            $this->setValue($this->name, $bind, $default, $language);
        }

        $this->mask = $mask;
    }

    /**
     * Mask options.
     *
     * @return array
     */
    public function maskOptions()
    {
        if (! $this->mask || $this->type === 'hidden') {
            return [];
        }

        return [
            'data-tallkit-assets' => 'alpine,imask',
            'x-data' => 'window.tallkit.component(\'mask\')',
            'x-init' => 'init('.json_encode(is_string($this->mask) ? ['mask' => $this->mask] : (object) $this->mask).')',
        ];
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
}
