<?php

namespace TALLKit\Components\Layouts;

use TALLKit\Components\BladeComponent;

class Html extends BladeComponent
{
    /**
     * @var string|null
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
     * @param  string|null  $title
     * @param  string  $charset
     * @param  bool  $livewire
     * @param  bool|array  $tallkit
     * @param  bool|null  $tailwindcss
     * @param  bool|null  $alpine
     * @param  string|bool  $stackStyles
     * @param  string|bool  $stackScripts
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $title = null,
        $charset = 'utf-8',
        $livewire = true,
        $tallkit = true,
        $tailwindcss = null,
        $alpine = null,
        $stackStyles = 'styles',
        $stackScripts = 'scripts',
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = $title ?: config('app.name');
        $this->charset = $charset;
        $this->livewire = $livewire && class_exists('\Livewire\Livewire');
        $this->tallkit = $tallkit ? array_replace_recursive(
            is_array($tallkit) ? $tallkit : [],
            is_bool($tailwindcss) ? ['options' => ['inject' => ['tailwindcss' => $tailwindcss]]] : [],
            is_bool($alpine) ? ['options' => ['inject' => ['alpine' => $alpine]]] : [],
        ) : false;

        $this->stackStyles = $stackStyles;
        $this->stackScripts = $stackScripts;
    }
}
