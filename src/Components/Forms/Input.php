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
     * @param  string|null  $name
     * @param  string|bool|null  $id
     * @param  string|bool|null  $label
     * @param  string|null  $type
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  mixed  $mask
     * @param  string|null  $language
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @param  bool  $groupable
     * @param  string|null  $prependText
     * @param  string|null  $prependIcon
     * @param  string|null  $appendText
     * @param  string|null  $appendIcon
     * @return void
     */
    public function __construct(
        $name = null,
        $id = null,
        $label = null,
        $type = null,
        $bind = null,
        $default = null,
        $mask = null,
        $language = null,
        $showErrors = true,
        $theme = null,
        $groupable = true,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null
    ) {
        parent::__construct(
            $name,
            $label,
            $showErrors,
            $theme,
            $groupable,
            $prependText,
            $prependIcon,
            $appendText,
            $appendIcon,
        );

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

        $encoded = json_encode(is_string($this->mask) ? ['mask' => $this->mask] : (object) $this->mask);

        return $this->attributes
            ->mergeOnlyThemeProvider($this->themeProvider, 'mask')
            ->merge(['x-init' => 'setup('.$encoded.')'], false)
            ->getAttributes();
    }

    /**
     * Get input type by name.
     *
     * @param  string|null  $name
     * @return string
     */
    protected function getTypeByName($name = null)
    {
        if (! $name) {
            return 'text';
        }

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
