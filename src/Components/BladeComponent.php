<?php

namespace TALLKit\Components;

use Illuminate\View\Component;
use TALLKit\Binders\ThemeBinder;
use TALLKit\Concerns\AlpineFormDataBinder;
use TALLKit\Concerns\Componentable;
use TALLKit\Concerns\LivewireFormDataBinder;
use TALLKit\Concerns\PrepareFormDataBinder;

abstract class BladeComponent extends Component
{
    use Componentable;
    use PrepareFormDataBinder;
    use AlpineFormDataBinder;
    use LivewireFormDataBinder;

    /**
     * The theme name.
     *
     * @var string|null
     */
    public $theme;

    /**
     * The theme provider.
     *
     * @var \TALLKit\Components\ThemeProvider
     */
    public $themeProvider;

    /**
     * The theme key.
     *
     * @var string
     */
    protected $themeKey;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $theme
     * @return void
     */
    public function __construct($theme = null)
    {
        $this->theme = $theme ?? app(ThemeBinder::class)->get() ?? ThemeProvider::getThemeByRoute();
        $this->themeProvider = app(ThemeProvider::class)->make($this->theme, [$this->getThemeKey()]);
    }

    /**
     * Get theme key.
     *
     * @return string
     */
    protected function getThemeKey()
    {
        return $this->themeKey ?? $this->getComponentKey();
    }
}
