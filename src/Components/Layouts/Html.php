<?php

namespace TALLKit\Components\Layouts;

use Illuminate\Support\Arr;
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
     * @var string
     */
    public $viewport;

    /**
     * @var bool
     */
    public $csrfToken;

    /**
     * @var string|bool|null
     */
    public $googleAnalytics;

    /**
     * @var string|null
     */
    public $googleFonts;

    /**
     * @var string|bool|null
     */
    public $googleTagManager;

    /**
     * @var bool
     */
    public $livewire;

    /**
     * @var string|null
     */
    public $mixStyles;

    /**
     * @var string|null
     */
    public $mixScripts;

    /**
     * @var array
     */
    public $styles;

    /**
     * @var array
     */
    public $scripts;

    /**
     * @var string|bool|null
     */
    public $stackStyles;

    /**
     * @var string|bool|null
     */
    public $stackScripts;

    /**
     * @var array|bool
     */
    public $tallkit;

    /**
     * Create a new component instance.
     *
     * @param  array|null  $options
     * @param  string|null  $title
     * @param  string|null  $charset
     * @param  string|null  $viewport
     * @param  bool|null  $csrfToken
     * @param  string|bool|null  $googleAnalytics
     * @param  string|null  $googleFonts
     * @param  string|bool|null  $googleTagManager
     * @param  bool|null  $livewire
     * @param  string|bool|null  $mixStyles
     * @param  string|bool|null  $mixScripts
     * @param  array|string|null  $styles
     * @param  array|string|null  $scripts
     * @param  string|bool|null  $stackStyles
     * @param  string|bool|null  $stackScripts
     * @param  bool|null  $tailwindcss
     * @param  bool|null  $alpine
     * @param  array|bool|null  $tallkit
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = null,
        $title = null,
        $charset = null,
        $viewport = null,
        $csrfToken = null,
        $googleAnalytics = null,
        $googleFonts = null,
        $googleTagManager = null,
        $livewire = null,
        $mixStyles = null,
        $mixScripts = null,
        $styles = null,
        $scripts = null,
        $stackStyles = null,
        $stackScripts = null,
        $tailwindcss = null,
        $alpine = null,
        $tallkit = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $options = array_merge_recursive(
            $this->themeProvider->options->getAttributes(),
            $options ?? []
        );

        $this->title = data_get($options, 'title', $title ?? config('app.name'));
        $this->charset = data_get($options, 'charset', $charset ?? 'utf-8');
        $this->viewport = data_get($options, 'viewport', $viewport ?? 'width=device-width, initial-scale=1');
        $this->csrfToken = data_get($options, 'csrfToken', $csrfToken ?? true);
        $this->googleAnalytics = data_get($options, 'googleAnalytics', data_get($options, 'analytics', $googleAnalytics));
        $this->googleFonts = data_get($options, 'googleFonts', data_get($options, 'fonts', $googleFonts));
        $this->googleTagManager = data_get($options, 'googleTagManager', data_get($options, 'gtm', $googleTagManager));
        $this->livewire = data_get($options, 'livewire', $livewire ?? true) && class_exists('\Livewire\Livewire');

        $mixStyles = data_get($options, 'mixStyles', $mixStyles ?? 'css/app.css');
        $mixScripts = data_get($options, 'mixScripts', $mixScripts ?? 'js/app.js');

        $this->mixStyles = $mixStyles && file_exists(public_path($mixStyles)) ? $mixStyles : null;
        $this->mixScripts = $mixScripts && file_exists(public_path($mixScripts)) ? $mixScripts : null;
        $this->styles = array_merge(data_get($options, 'styles', []), Arr::wrap($styles));
        $this->scripts = array_merge(data_get($options, 'scripts', []), Arr::wrap($scripts));
        $this->stackStyles = data_get($options, 'stackStyles', $stackStyles ?? 'styles');
        $this->stackScripts = data_get($options, 'stackScripts', $stackScripts ?? 'scripts');

        $tailwindcss = $tailwindcss ?? is_null($this->mixStyles);

        $this->tallkit = ($tallkit ?? true) ? array_replace_recursive(
            Arr::wrap($tallkit),
            is_bool($tailwindcss) ? ['options' => ['inject' => ['tailwindcss' => $tailwindcss]]] : [],
            is_bool($alpine) ? ['options' => ['inject' => ['alpine' => $alpine]]] : [],
            data_get($options, 'tallkit', []),
        ) : false;
    }
}
