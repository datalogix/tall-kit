<?php

namespace TALLKit;

use Illuminate\Contracts\Foundation\CachesConfiguration;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;
use Livewire\Livewire;
use TALLKit\Binders\FormDataBinder;
use TALLKit\Binders\ThemeBinder;
use TALLKit\Components\ThemeProvider;
use TALLKit\Controllers\JavaScriptAssets;
use TALLKit\Controllers\Upload;
use TALLKit\Macros\MergeOnlyThemeProvider;
use TALLKit\Macros\MergeThemeProvider;

class TALLKitServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerSingleton();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tallkit.php', 'tallkit');
    }

    /**
     * Register singleton.
     *
     * @return void
     */
    protected function registerSingleton()
    {
        $this->app->singleton(TALLKit::class);
        $this->app->singleton(FormDataBinder::class);
        $this->app->singleton(ThemeBinder::class);
        $this->app->alias(TALLKit::class, 'tallkit');
        $this->app->bind(ThemeProvider::class, function () {
            return new ThemeProvider(config('tallkit.themes'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootMacros();
        $this->bootResources();
        $this->bootRoutes();
        $this->bootBladeComponents();
        $this->bootLivewireComponents();
        $this->bootDirectives();
        $this->bootPublishing();
    }

    /**
     * Bootstrap macros.
     *
     * @return void
     */
    protected function bootMacros()
    {
        ComponentAttributeBag::macro('mergeThemeProvider', app(MergeThemeProvider::class)());
        ComponentAttributeBag::macro('mergeOnlyThemeProvider', app(MergeOnlyThemeProvider::class)());
    }

    /**
     * Bootstrap resources.
     *
     * @return void
     */
    protected function bootResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tallkit');
    }

    /**
     * Bootstrap routes.
     *
     * @return void
     */
    protected function bootRoutes()
    {
        Route::get('/tallkit/{path}', [JavaScriptAssets::class, 'source'])->name('tallkit.source');
        Route::get('/tallkit/component/{name}', [JavaScriptAssets::class, 'component'])->name('tallkit.component');

        if (config('tallkit.options.upload.enabled')) {
            Route::post('/tallkit/upload', [Upload::class, 'store'])
                ->middleware(config('tallkit.options.upload.middleware', 'web'))
                ->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class)
                ->name('tallkit.upload');

            Route::delete('/tallkit/upload', [Upload::class, 'destroy'])
                ->middleware(config('tallkit.options.upload.middleware', 'web'));
        }
    }

    /**
     * Bootstrap blade components.
     *
     * @return void
     */
    protected function bootBladeComponents()
    {
        $prefix = config('tallkit.prefix', '');

        $this->loadViewComponentsAs($prefix, config('tallkit.components', []));

        if (config('tallkit.options.aliases')) {
            $this->loadViewComponentsAs($prefix, config('tallkit.aliases', []));
        }
    }

    /**
     * Bootstrap livewire components.
     *
     * @return void
     */
    protected function bootLivewireComponents()
    {
        if (! class_exists(Livewire::class)) {
            return;
        }

        $prefix = config('tallkit.prefix', '');

        /** @var \TALLKit\Components\LivewireComponent $component */
        foreach (config('tallkit.livewire', []) as $alias => $component) {
            Livewire::component($prefix ? "$prefix-$alias" : $alias, $component);
        }
    }

    /**
     * Bootstrap directives.
     *
     * @return void
     */
    protected function bootDirectives()
    {
        Blade::directive('tallkitStyles', [TALLKitBladeDirectives::class, 'styles']);
        Blade::directive('tallkitScripts', [TALLKitBladeDirectives::class, 'scripts']);
        Blade::directive('theme', [TALLKitBladeDirectives::class, 'theme']);
        Blade::directive('endtheme', [TALLKitBladeDirectives::class, 'endtheme']);
        Blade::directive('bind', [TALLKitBladeDirectives::class, 'bind']);
        Blade::directive('endbind', [TALLKitBladeDirectives::class, 'endbind']);
        Blade::directive('wire', [TALLKitBladeDirectives::class, 'wire']);
        Blade::directive('endwire', [TALLKitBladeDirectives::class, 'endwire']);
        Blade::directive('scopedslot', [TALLKitBladeDirectives::class, 'scopedslot']);
        Blade::directive('endscopedslot', [TALLKitBladeDirectives::class, 'endscopedslot']);
    }

    /**
     * Bootstrap publishing.
     *
     * @return void
     */
    protected function bootPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../public' => public_path('vendor/tallkit'),
            ], 'tallkit-assets');

            $this->publishes([
                __DIR__.'/../config/tallkit.php' => config_path('tallkit.php'),
            ], 'tallkit-config');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/tallkit'),
            ], 'tallkit-views');
        }
    }

    /**
     * Merge the given configuration with the existing configuration.
     *
     * @param  string  $path
     * @param  string  $key
     * @return void
     */
    protected function mergeConfigFrom($path, $key)
    {
        if (! ($this->app instanceof CachesConfiguration && $this->app->configurationIsCached())) {
            $config = $this->app->make('config');

            $config->set($key, $this->mergeConfigs(
                require $path, $config->get($key, [])
            ));
        }
    }

    /**
     * Merges the configs together and takes multi-dimensional arrays into account.
     *
     * @param  array  $original
     * @param  array  $merging
     * @return array
     */
    protected function mergeConfigs(array $original, array $merging)
    {
        $array = array_merge($original, $merging);

        foreach ($original as $key => $value) {
            if (! is_array($value)) {
                continue;
            }

            if (! Arr::exists($merging, $key)) {
                continue;
            }

            // @codeCoverageIgnoreStart
            if (is_numeric($key)) {
                continue;
            }

            $array[$key] = $this->mergeConfigs($value, $merging[$key]);
            // @codeCoverageIgnoreEnd
        }

        return $array;
    }
}
