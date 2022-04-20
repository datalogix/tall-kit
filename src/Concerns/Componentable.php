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
        return $this->componentKey ?? Str::kebab(class_basename($this));
    }

    /**
     * Get component view.
     *
     * @return string
     */
    protected function getComponentView()
    {
        return (string) Str::of(get_called_class())
                ->beforeLast('\\')
                ->lower()
                ->replace(['tallkit\\', '\\'], ['tallkit::', '.'])
                ->append('.')
                ->append($this->getComponentKey());
    }

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        return view($this->getComponentView());
    }
}
