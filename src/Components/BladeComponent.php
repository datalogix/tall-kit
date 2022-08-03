<?php

namespace TALLKit\Components;

use Illuminate\View\Component;
use TALLKit\Concerns\Componentable;
use TALLKit\Concerns\LivewireFormDataBinder;

abstract class BladeComponent extends Component
{
    use Componentable;
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
        $this->theme = $theme ?? 'default';
        $this->themeProvider = app(ThemeProvider::class)
            ->make($this->theme, $this->getThemeKey());
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
