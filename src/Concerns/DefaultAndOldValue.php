<?php

namespace TALLKit\Concerns;

trait DefaultAndOldValue
{
    use BoundValues;

    /**
     * The bind target.
     *
     * @var mixed
     */
    public $bind;

    /**
     * The default value.
     *
     * @var mixed
     */
    public $default;

    /**
     * The language field.
     *
     * @var mixed
     */
    public $language;

    /**
     * Set default and old value.
     *
     * @param  string|null  $name
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  mixed  $language
     * @return void
     */
    protected function setValue($name = null, $bind = null, $default = null, $language = null)
    {
        $this->bind = $bind;
        $this->default = $default;
        $this->language = $language;

        if ($this->isWired() || ! $name) {
            return;
        }

        if (! $language) {
            $default = $this->getBoundValue($bind, $name) ?: $default;

            return $this->value = old($name, $default);
        }

        if ($bind !== false) {
            $bind = $bind ?: $this->getBoundTarget();
        }

        if ($bind) {
            $default = $bind->getTranslation($name, $language, false) ?: $default;
        }

        $this->value = old("{$name}.{$language}", $default);
    }
}
