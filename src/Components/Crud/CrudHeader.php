<?php

namespace TALLKit\Components\Crud;

use TALLKit\Components\BladeComponent;

class CrudHeader extends BladeComponent
{
    /**
     * @var string|bool|null
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $title
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $title = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = $title;
    }
}
