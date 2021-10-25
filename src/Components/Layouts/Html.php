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
     * @var string
     */
    public $viewport;

    /**
     * @var bool
     */
    public $csrfToken;

    /**
     * @var string|null
     */
    public $googleFonts;

    /**
     * @var bool
     */
    public $livewire;

    /**
     * @var bool|array
     */
    public $tallkit;

    /**
     * @var string|bool|null
     */
    public $mixStyles;

    /**
     * @var string|bool|null
     */
    public $mixScripts;

    /**
     * @var string|bool|null
     */
    public $stackStyles;

    /**
     * @var string|bool|null
     */
    public $stackScripts;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $title
     * @param  string  $charset
     * @param  string  $viewport
     * @param  bool  $csrfToken
     * @param  string|null  $googleFonts
     * @param  bool  $livewire
     * @param  bool|array  $tallkit
     * @param  bool|null  $tailwindcss
     * @param  bool|null  $alpine
     * @param  string|bool|null  $mixStyles
     * @param  string|bool|null  $mixScripts
     * @param  string|bool|null  $stackStyles
     * @param  string|bool|null  $stackScripts
     * @param  arrray  $options
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $title = null,
        $charset = 'utf-8',
        $viewport = 'width=device-width, initial-scale=1',
        $csrfToken = true,
        $googleFonts = null,
        $livewire = true,
        $tallkit = true,
        $tailwindcss = null,
        $alpine = null,
        $mixStyles = 'css/app.css',
        $mixScripts = 'js/app.js',
        $stackStyles = 'styles',
        $stackScripts = 'scripts',
        $options = [],
        $theme = null
    ) {
        parent::__construct($theme);

        $this->title = data_get($options, 'title', $title ?? config('app.name'));
        $this->charset = data_get($options, 'charset', $charset);
        $this->viewport = data_get($options, 'viewport', $viewport);
        $this->csrfToken = data_get($options, 'csrfToken', $csrfToken);
        $this->googleFonts = data_get($options, 'googleFonts', $googleFonts);
        $this->livewire = data_get($options, 'livewire', $livewire) && class_exists('\Livewire\Livewire');
        $this->tallkit = $tallkit ? array_replace_recursive(
            is_array($tallkit) ? $tallkit : [],
            is_bool($tailwindcss) ? ['options' => ['inject' => ['tailwindcss' => $tailwindcss]]] : [],
            is_bool($alpine) ? ['options' => ['inject' => ['alpine' => $alpine]]] : [],
            data_get($options, 'tallkit', []),
        ) : false;

        $mixStyles = data_get($options, 'mixStyles', $mixStyles);
        $mixScripts = data_get($options, 'mixScripts', $mixScripts);

        $this->mixStyles = $mixStyles && file_exists(public_path($mixStyles)) ? $mixStyles : null;
        $this->mixScripts = $mixScripts && file_exists(public_path($mixScripts)) ? $mixScripts : null;
        $this->stackStyles = data_get($options, 'stackStyles', $stackStyles);
        $this->stackScripts = data_get($options, 'stackScripts', $stackScripts);
    }
}
