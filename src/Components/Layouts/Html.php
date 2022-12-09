<?php

namespace TALLKit\Components\Layouts;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use TALLKit\Components\BladeComponent;

class Html extends BladeComponent
{
    /**
     * @var string|null
     */
    public $lang;

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
     * @var \Illuminate\Support\Collection
     */
    public $meta;

    /**
     * @var bool|null
     */
    public $turbo;

    /**
     * @var array|string|null
     */
    public $googleFonts;

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
     * @var \Illuminate\Support\Collection
     */
    public $vite;

    /**
     * @var string
     */
    public $viteBuildDirectory;

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
     * @param  string|null  $lang
     * @param  string|null  $title
     * @param  string|null  $charset
     * @param  string|null  $viewport
     * @param  bool|null  $csrfToken
     * @param  mixed  $meta
     * @param  bool|null  $turbo
     * @param  array|string|null  $googleFonts
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
     * @param  mixed  $vite
     * @param  string|null  $viteBuildDirectory
     * @param  bool|null  $tailwindcss
     * @param  bool|null  $alpine
     * @param  array|bool|null  $tallkit
     * @param  mixed  $components
     * @param  string|null  $typekit
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $options = null,
        $lang = null,
        $title = null,
        $charset = null,
        $viewport = null,
        $csrfToken = null,
        $meta = null,
        $turbo = null,
        $googleFonts = null,
        $googleAnalytics = null,
        $googleTagManager = null,
        $facebookPixelCode = null,
        $livewire = null,
        $mixStyles = null,
        $mixScripts = null,
        $vite = null,
        $viteBuildDirectory = null,
        $styles = null,
        $scripts = null,
        $stackStyles = null,
        $stackScripts = null,
        $tailwindcss = null,
        $alpine = null,
        $tallkit = null,
        $components = null,
        $typekit = null,
        $theme = null
    ) {
        parent::__construct($theme ?? 'app');

        $options = array_merge_recursive(
            $this->themeProvider->options->getAttributes(),
            Arr::wrap($options)
        );

        $this->lang = $lang ?? target_get($options, 'lang');
        $this->title = $title ?? target_get($options, 'title');
        $this->charset = $charset ?? target_get($options, 'charset', 'utf-8');
        $this->viewport = $viewport ?? target_get($options, 'viewport', 'width=device-width, initial-scale=1');
        $this->csrfToken = $csrfToken ?? target_get($options, 'csrf-token', true);
        $this->meta = Collection::make($meta)->merge(target_get($options, 'meta'));
        $this->turbo = $turbo ?? target_get($options, 'turbo');
        $this->googleFonts = $googleFonts ?? target_get($options, ['google-fonts', 'fonts']);
        $this->googleAnalytics = $googleAnalytics ?? target_get($options, ['google-analytics', 'analytics']);
        $this->googleTagManager = $googleTagManager ?? target_get($options, ['google-tag-manager', 'gtm']);
        $this->facebookPixelCode = $facebookPixelCode ?? target_get($options, ['facebook-pixel-code', 'facebook-pixel']);
        $this->livewire = $livewire ?? target_get($options, 'livewire', true) && class_exists('\Livewire\Livewire');

        $this->mixStyles = Collection::make($mixStyles)->merge(target_get($options, 'mix-styles', 'css/app.css'))->filter(function ($file) {
            return file_exists(public_path($file));
        })->unique();

        $this->mixScripts = Collection::make($mixScripts)->merge(target_get($options, 'mix-scripts', 'js/app.js'))->filter(function ($file) {
            return file_exists(public_path($file));
        })->unique();

        $this->styles = Collection::make($styles)->merge(target_get($options, 'styles'))->unique();
        $this->scripts = Collection::make($scripts)->merge(target_get($options, 'scripts'))->unique();
        $this->stackStyles = $stackStyles ?? target_get($options, 'stack-styles', 'styles');
        $this->stackScripts = $stackScripts ?? target_get($options, 'stack-scripts', 'scripts');

        $this->viteBuildDirectory = $viteBuildDirectory ?? 'build';
        $this->vite = Collection::make($vite)
            ->merge(target_get($options, 'vite', [
                'resources/css/app.css',
                'resources/css/app.sass',
                'resources/css/app.scss',
                'resources/js/app.js',
                'resources/js/app.ts',
            ]))
            ->filter(function ($file) {
                return file_exists(base_path($file));
            })
            ->unique();

        $this->tallkit = ($tallkit ?? true) ? array_replace_recursive(
            Arr::wrap($tallkit),
            is_bool($tailwindcss) ? ['options' => ['inject' => ['tailwindcss' => $tailwindcss]]] : [],
            is_bool($alpine) ? ['options' => ['inject' => ['alpine' => $alpine]]] : [],
            target_get($options, 'tallkit', []),
        ) : false;

        $this->components = Collection::make($components)
            ->merge(target_get($options, 'components'))
            ->filter(function ($component) {
                return ! target_get($component, 'disabled');
            });

        if ($typekit = $typekit ?? target_get($options, 'typekit')) {
            $this->styles->push('https://use.typekit.net/'.$typekit.'.css');
        }
    }
}
