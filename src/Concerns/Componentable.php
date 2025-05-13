<?php

namespace TALLKit\Concerns;

use Illuminate\Support\Str;

trait Componentable
{
    /**
     * The component key.
     *
     * @var string
     */
    protected $componentKey;

    /**
     * Get component key.
     *
     * @return string
     */
    protected function getComponentKey()
    {
        return $this->componentKey ??= Str::of(class_basename($this))->kebab()->toString();
    }

    /**
     * Get component view.
     *
     * @return string
     */
    protected function getComponentView()
    {
        return Str::of(static::class)
             ->replace('\\', '/')
             ->replace('TALLKit/', '')
             ->prepend(__DIR__.'/../')
             ->append('.blade.php')
             ->toString();
    }

    /**
     * Get blade view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    protected function blade()
    {
        return view()->file($this->getComponentView());
    }
}
