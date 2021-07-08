<?php

namespace TALLKit\Components\Forms;

use TALLKit\Components\BladeComponent;

class FieldGroup extends BladeComponent
{
    /**
     * @var string|null
     */
    public $prependText;

    /**
     * @var string|null
     */
    public $prependIcon;

    /**
     * @var string|null
     */
    public $appendText;

    /**
     * @var string|null
     */
    public $appendIcon;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $theme
     * @param  string|null  $prependText
     * @param  string|null  $prependIcon
     * @param  string|null  $appendText
     * @param  string|null  $appendIcon
     * @return void
     */
    public function __construct(
        $theme = null,
        $prependText = null,
        $prependIcon = null,
        $appendText = null,
        $appendIcon = null
    ) {
        parent::__construct($theme);

        $this->prependText = $prependText;
        $this->prependIcon = $prependIcon;
        $this->appendText = $appendText;
        $this->appendIcon = $appendIcon;
    }
}
