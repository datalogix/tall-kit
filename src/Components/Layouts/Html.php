<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class Html extends BladeComponent
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $charset;

    /**
     * @var bool
     */
    public $livewire;

    /**
     * @var bool|array
     */
    public $tallkit;

    /**
     * @var string|bool
     */
    public $stackStyles;

    /**
     * @var string|bool
     */
    public $stackScripts;

    /**
     * Create a new component instance.
     *
     * @param  string  $title
     * @param  string  $charset
     * @param  bool  $livewire
     * @param  bool|array  $tallkit
     * @param  string|bool  $stackStyles
     * @param  string|bool  $stackScripts
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $title = '',
        $charset = 'utf-8',
        $livewire = true,
        $tallkit = true,
        $stackStyles = 'styles',
        $stackScripts = 'scripts',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = $title ?: config('app.name');
        $this->charset = $charset;
        $this->livewire = $livewire && class_exists('\Livewire\Livewire');
        $this->tallkit = $tallkit;
        $this->stackStyles = $stackStyles;
        $this->stackScripts = $stackScripts;
    }
}
