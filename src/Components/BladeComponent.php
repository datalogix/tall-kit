<?php

namespace TALLKit\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component as BaseComponent;
use TALLKit\Concerns\LivewireFormDataBinder;

abstract class BladeComponent extends BaseComponent
{
    use LivewireFormDataBinder;

    /**
     * The theme provider.
     *
     * @var \TALLKit\Components\ThemeProvider
     */
    public $themeProvider;

    /**
     * The theme name.
     *
     * @var string|null
     */
    public $theme;

    /**
     * The component key.
     *
     * @var string
     */
    protected $componentKey;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $theme
     * @return void
     */
    public function __construct($theme = null)
    {
        $this->theme = $theme;
        $this->themeProvider = app(ThemeProvider::class)
            ->make($this->theme, $this->getComponentKey());
    }

    /**
     * Get component key.
     *
     * @return string
     */
    protected function getComponentKey()
    {
        return $this->componentKey ?? Str::kebab(class_basename($this));
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        return (string) Str::of(get_class($this))
                ->beforeLast('\\')
                ->replace([__NAMESPACE__, '\\'], ['', '.'])
                ->lower()
                ->prepend('tallkit::components')
                ->append('.')
                ->append($this->getComponentKey());
    }
}
