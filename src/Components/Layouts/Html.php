<?php

namespace TALLKit\Components\Layouts;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
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
     * @var \Illuminate\Support\Collection
     */
    public $meta;

    /**
     * @var array|string|null
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
     * @var \Illuminate\Support\Collection
     */
    public $mixStyles;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $mixScripts;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $styles;

    /**
     * @var \Illuminate\Support\Collection
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
     * @var \Illuminate\Support\Collection
     */
    public $components;

    /**
     * Create a new component instance.
     *
     * @param  mixed  $options
     * @param  string|null  $title
     * @param  string|null  $charset
     * @param  string|null  $viewport
     * @param  bool|null  $csrfToken
     * @param  mixed  $meta
     * @param  array|string|null  $googleFonts
     * @param  bool|null  $turbo
     * @param  string|bool|null  $googleAnalytics
     * @param  string|bool|null  $googleTagManager
     * @param  string|bool|null  $facebookPixelCode
     * @param  bool|null  $livewire
     * @param  mixed  $mixStyles
     * @param  mixed  $mixScripts
     * @param  mixed  $styles
     * @param  mixed  $scripts
     * @param  string|bool|null  $stackStyles
     * @param  string|bool|null  $stackScripts
     * @param  bool|null  $tailwindcss
     * @param  bool|null  $alpine
     * @param  array|bool|null  $tallkit
     * @param  mixed  $components
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = null,
        $title = null,
        $charset = null,
        $viewport = null,
        $csrfToken = null,
        $meta = null,
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
        $components = null,
        $theme = null
    ) {
        parent::__construct($theme ?? 'app');

        $options = array_merge_recursive(
            $this->themeProvider->options->getAttributes(),
            Arr::wrap($options)
        );

        $this->title = $title ?? data_get($options, 'title');
        $this->charset = $charset ?? data_get($options, 'charset', 'utf-8');
        $this->viewport = $viewport ?? data_get($options, 'viewport', 'width=device-width, initial-scale=1');
        $this->csrfToken = $csrfToken ?? data_get($options, 'csrf-token', true);
        $this->meta = Collection::make($meta)->merge(data_get($options, 'meta'));
        $this->googleFonts = $googleFonts ?? data_get($options, 'google-fonts', data_get($options, 'fonts'));
        $this->turbo = $turbo ?? data_get($options, 'turbo');
        $this->googleAnalytics = $googleAnalytics ?? data_get($options, 'google-analytics', data_get($options, 'analytics'));
        $this->googleTagManager = $googleTagManager ?? data_get($options, 'google-tag-manager', data_get($options, 'gtm'));
        $this->facebookPixelCode = $facebookPixelCode ?? data_get($options, 'facebook-pixel-code', data_get($options, 'facebook-pixel'));
        $this->livewire = $livewire ?? data_get($options, 'livewire', true) && class_exists('\Livewire\Livewire');

        $this->mixStyles = Collection::make($mixStyles)->merge(data_get($options, 'mix-styles', 'css/app.css'))->filter(function ($file) {
            return file_exists(public_path($file));
        })->unique();

        $this->mixScripts = Collection::make($mixScripts)->merge(data_get($options, 'mix-scripts', 'js/app.js'))->filter(function ($file) {
            return file_exists(public_path($file));
        })->unique();

        $this->styles = Collection::make($styles)->merge(data_get($options, 'styles'))->unique();
        $this->scripts = Collection::make($scripts)->merge(data_get($options, 'scripts'))->unique();
        $this->stackStyles = $stackStyles ?? data_get($options, 'stack-styles', 'styles');
        $this->stackScripts = $stackScripts ?? data_get($options, 'stack-scripts', 'scripts');

        $tailwindcss = $tailwindcss ?? $this->mixStyles->isEmpty();

        $this->tallkit = ($tallkit ?? true) ? array_replace_recursive(
            Arr::wrap($tallkit),
            is_bool($tailwindcss) ? ['options' => ['inject' => ['tailwindcss' => $tailwindcss]]] : [],
            is_bool($alpine) ? ['options' => ['inject' => ['alpine' => $alpine]]] : [],
            data_get($options, 'tallkit', []),
        ) : false;

        $this->components = Collection::make($components)
            ->merge(data_get($options, 'components'))
            ->filter(function ($component) {
                return ! value(data_get($component, 'disabled'));
            });
    }
}
