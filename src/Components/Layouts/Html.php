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
     * @var string|null
     */
    public $googleFonts;

    /**
     * @var bool|null
     */
    public $turbo;

    /**
     * @var string|bool|null
     */
    public $googleAnalytics;

    /**
     * @var string|bool|null
     */
    public $googleTagManager;

    /**
     * @var string|bool|null
     */
    public $facebookPixelCode;

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
     * @param  string|null  $googleFonts
     * @param  bool|null  $turbo
     * @param  string|bool|null  $googleAnalytics
     * @param  string|bool|null  $googleTagManager
     * @param  string|bool|null  $facebookPixelCode
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
        $googleFonts = null,
        $turbo = null,
        $googleAnalytics = null,
        $googleTagManager = null,
        $facebookPixelCode = null,
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
        $this->csrfToken = data_get($options, 'csrf-token', $csrfToken ?? true);
        $this->googleFonts = data_get($options, 'google-fonts', data_get($options, 'fonts', $googleFonts));
        $this->turbo = data_get($options, 'turbo', $turbo);
        $this->googleAnalytics = data_get($options, 'google-analytics', data_get($options, 'analytics', $googleAnalytics));
        $this->googleTagManager = data_get($options, 'google-tag-manager', data_get($options, 'gtm', $googleTagManager));
        $this->facebookPixelCode = data_get($options, 'facebook-pixel-code', data_get($options, 'facebook-pixel', $facebookPixelCode));
        $this->livewire = data_get($options, 'livewire', $livewire ?? true) && class_exists('\Livewire\Livewire');

        $this->mixStyles = collect(Arr::wrap(data_get($options, 'mix-styles', $mixStyles ?? 'css/app.css')))->filter(function($file) {
            return file_exists(public_path($file));
        })->unique();

        $this->mixScripts = collect(Arr::wrap(data_get($options, 'mix-scripts', $mixScripts ?? 'js/app.js')))->filter(function($file) {
            return file_exists(public_path($file));
        })->unique();

        $this->styles = array_merge(Arr::wrap(data_get($options, 'styles')), Arr::wrap($styles));
        $this->scripts = array_merge(Arr::wrap(data_get($options, 'scripts')), Arr::wrap($scripts));
        $this->stackStyles = data_get($options, 'stack-styles', $stackStyles ?? 'styles');
        $this->stackScripts = data_get($options, 'stack-scripts', $stackScripts ?? 'scripts');

        $tailwindcss = $tailwindcss ?? $this->mixStyles->isEmpty();

        $this->tallkit = ($tallkit ?? true) ? array_replace_recursive(
            Arr::wrap($tallkit),
            is_bool($tailwindcss) ? ['options' => ['inject' => ['tailwindcss' => $tailwindcss]]] : [],
            is_bool($alpine) ? ['options' => ['inject' => ['alpine' => $alpine]]] : [],
            data_get($options, 'tallkit', []),
        ) : false;
    }
}
