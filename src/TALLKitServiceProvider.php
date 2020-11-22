<?php

namespace Datalogix\TALLKit;

use Datalogix\TALLKit\Components\ThemeProvider;
use Illuminate\Contracts\Foundation\CachesConfiguration;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class TALLKitServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tall-kit.php', 'tall-kit');

        $this->app->singleton(FormDataBinder::class, function () {
            return new FormDataBinder;
        });

        $this->app->singleton(ThemeBinder::class, function () {
            return new ThemeBinder;
        });

        $this->app->bind(ThemeProvider::class, function () {
            return new ThemeProvider(config('tall-kit.themes'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootDirectives();
        $this->bootPublishing();
    }

    /**
     * Bootstrap resources.
     *
     * @return void
     */
    private function bootResources()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tall-kit');
    }

    /**
     * Bootstrap blade components.
     *
     * @return void
     */
    private function bootBladeComponents()
    {
        $prefix = config('tall-kit.prefix', '');
        $components = config('tall-kit.components', []);
        $assets = config('tall-kit.assets', []);

        $this->loadViewComponentsAs($prefix, $components);

        /** @var \Datalogix\TALLKit\Components\BladeComponent $component */
        foreach ($components as $component) {
            $this->registerAssets($component, $assets);
        }
    }

    /**
     * Register assets of components.
     *
     * @param  \Datalogix\TALLKit\Components\BladeComponent  $component
     * @param  array  $assets
     * @return void
     */
    private function registerAssets($component, array $assets)
    {
        foreach ($component::assets() as $asset) {
            $files = (array) ($assets[$asset] ?? []);

            // register css
            collect($files)->filter(function (string $file) {
                return Str::endsWith($file, '.css');
            })->each(function (string $style) {
                TALLKit::addStyle($style);
            });

            // register js
            collect($files)->filter(function (string $file) {
                return ! Str::endsWith($file, '.css');
            })->each(function (string $script) {
                TALLKit::addScript($script);
            });
        }
    }

    /**
     * Bootstrap directives.
     *
     * @return void
     */
    private function bootDirectives()
    {
        Blade::directive('tallkitStyles', function () {
            return '<?php echo \Datalogix\TALLKit\TALLKit::outputStyles(); ?>';
        });

        Blade::directive('tallkitScripts', function () {
            return '<?php echo \Datalogix\TALLKit\TALLKit::outputScripts(); ?>';
        });

        Blade::directive('theme', function ($theme) {
            return '<?php app(\Datalogix\TALLKit\ThemeBinder::class)->bind('.$theme.'); ?>';
        });

        Blade::directive('endtheme', function () {
            return '<?php app(\Datalogix\TALLKit\ThemeBinder::class)->pop(); ?>';
        });

        Blade::directive('bind', function ($bind) {
            return '<?php app(\Datalogix\TALLKit\FormDataBinder::class)->bind('.$bind.'); ?>';
        });

        Blade::directive('endbind', function () {
            return '<?php app(\Datalogix\TALLKit\FormDataBinder::class)->pop(); ?>';
        });

        Blade::directive('wire', function () {
            return '<?php app(\Datalogix\TALLKit\FormDataBinder::class)->wire(); ?>';
        });

        Blade::directive('endwire', function () {
            return '<?php app(\Datalogix\TALLKit\FormDataBinder::class)->endWire(); ?>';
        });
    }

    /**
     * Bootstrap publishing.
     *
     * @return void
     */
    private function bootPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/tall-kit.php' => config_path('tall-kit.php'),
            ], 'tall-kit-config');

            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/tall-kit'),
            ], 'tall-kit-views');
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
