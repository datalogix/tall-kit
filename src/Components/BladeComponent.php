<?php

namespace Datalogix\TALLKit\Components;

use Datalogix\TALLKit\Traits\HandlesAssets;
use Datalogix\TALLKit\Traits\HandlesLivewireFormDataBinder;
use Illuminate\Support\Str;
use Illuminate\View\Component as BaseComponent;

abstract class BladeComponent extends BaseComponent
{
    use HandlesAssets;
    use HandlesLivewireFormDataBinder;

    /**
     * The theme provider.
     *
     * @var \Datalogix\TALLKit\Components\ThemeProvider
     */
    public $themeProvider;

    /**
     * The theme name.
     *
     * @var string|null
     */
    public $theme;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $theme
     * @return void
     */
    public function __construct($theme = null)
    {
        $this->theme = $theme;
        $this->themeProvider = app(ThemeProvider::class)->make($theme, class_basename($this));
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        return (string) Str::of(get_class($this))
                ->replace([__NAMESPACE__, '\\'], ['', '.'])
                ->lower()
                ->prepend('tall-kit::components');
    }
}
