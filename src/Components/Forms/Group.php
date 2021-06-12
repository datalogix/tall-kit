<?php

namespace TALLKit\Components\Forms;

class Group extends Field
{
    /**
     * @var string
     */
    public $type = false;

    /**
     * Create a new component instance.
     *
     * @param  string  $name
     * @param  string|bool|null  $label
     * @param  string  $type
     * @param  bool  $showErrors
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = '',
        $label = '',
        $type = 'block',
        $showErrors = true,
        $theme = null
    ) {
        parent::__construct($name, $label, $showErrors, $theme);

        $this->type = $type;
    }
}
