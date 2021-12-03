<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class GoogleTagManager extends BladeComponent
{
    /**
     * @var string|null
     */
    public $id;

    /**
     * @var bool
     */
    public $noscript;

    /**
     * Create a new component instance.
     *
     * @param  string|bool|null  $id
     * @param  bool|null  $noscript
     * @return void
     */
    public function __construct($id = null, $noscript = null)
    {
        parent::__construct(null);

        $this->id = is_string($id) ? $id : ($id === true ? config('services.google-tag-manager.id') : null);
        $this->noscript = $noscript ?? false;
    }
}
