<?php

namespace Datalogix\TALLKit\Traits;

trait HandlesDefaultAndOldValue
{
    use HandlesBoundValues;

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
     * @param  string  $name
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  mixed  $language
     * @return void
     */
    private function setValue($name, $bind = null, $default = null, $language = null)
    {
        if ($this->isWired()) {
            return;
        }

        $this->bind = $bind;
        $this->default = $default;
        $this->language = $language;

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
