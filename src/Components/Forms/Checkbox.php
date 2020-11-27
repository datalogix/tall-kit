<?php

namespace Datalogix\TALLKit\Components\Forms;

use Datalogix\TALLKit\Components\BladeComponent;
use Datalogix\TALLKit\Concerns\BoundValues;
use Datalogix\TALLKit\Concerns\LabelText;
use Datalogix\TALLKit\Concerns\ValidationErrors;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Checkbox extends BladeComponent
{
    use BoundValues;
    use LabelText;
    use ValidationErrors;

    /**
     * The checkbox name.
     *
     * @var string
     */
    public $name;

    /**
     * The checkbox value.
     *
     * @var mixed
     */
    public $value;

    /**
     * The checkbox is checked.
     *
     * @var bool
     */
    public $checked = false;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|bool|null  $label
     * @param  mixed  $value
     * @param  mixed  $bind
     * @param  bool  $default
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name,
        $label = '',
        $value = 1,
        $bind = null,
        $default = false,
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->setLabel($name, $label);

        $this->name = $name;
        $this->value = $value;
        $this->showErrors = $showErrors;

        $key = Str::before($name, '[]');

        if ($oldData = old($key)) {
            $this->checked = in_array($value, Arr::wrap($oldData));
        }

        if (! session()->hasOldInput() && $this->isNotWired()) {
            $boundValue = $this->getBoundValue($bind, $key);

            $this->checked = is_null($boundValue)
                ? $default
                : in_array($value, Arr::wrap($boundValue));
        }
    }
}
