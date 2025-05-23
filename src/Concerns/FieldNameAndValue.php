<?php

namespace TALLKit\Concerns;

use Illuminate\Support\Str;

trait FieldNameAndValue
{
    use BoundValues;

    /**
     * @var string|null
     */
    public $name;

    /**
     * @var string|null
     */
    protected $fieldKey;

    /**
     * @var string|null
     */
    protected $fieldName;

    /**
     * Get field key.
     *
     * @return string
     */
    protected function getFieldKey()
    {
        return $this->fieldKey ??= Str::before($this->name, '[]');
    }

    /**
     * Get field name.
     *
     * @return string
     */
    protected function getFieldName()
    {
        return $this->fieldName ??= Str::replace(['[', ']'], ['.', ''], $this->getFieldKey());
    }

    /**
     * Has name.
     *
     * @return bool
     */
    protected function hasName()
    {
        return ! empty($this->name);
    }

    /**
     * Get field value.
     *
     * @param  mixed  $bind
     * @param  mixed  $default
     * @return mixed
     */
    protected function getFieldValue($bind = null, $default = null)
    {
        return $this->oldFieldValue($this->getFieldBoundValue($bind) ?? $default);
    }

    /**
     * Old field value.
     *
     * @param  mixed  $default
     * @return mixed
     */
    protected function oldFieldValue($default = null)
    {
        return old($this->getFieldName(), $default);
    }

    /**
     * Get field bound value.
     *
     * @param  mixed  $bind
     * @return mixed
     */
    protected function getFieldBoundValue($bind = null)
    {
        return $this->getBoundValue($bind, $this->getFieldName());
    }

    /**
     * Get default and old value.
     *
     * @param  mixed  $bind
     * @param  mixed  $default
     * @param  mixed  $language
     * @return void
     */
    protected function getValue($bind = null, $default = null, $language = null)
    {
        if ($this->isWired() && $this->type !== 'file') {
            return;
        }

        if (! $this->hasName()) {
            return $default;
        }

        if (! $language) {
            return $this->formatValue($this->getFieldValue($bind, $default));
        }

        if ($bind !== false) {
            $bind ??= $this->getBoundTarget();
        }

        if ($bind) {
            $default = $this->formatValue($bind->getTranslation($this->getFieldKey(), $language, false)) ?: $default;
        }

        return old("{$this->getFieldName()}.{$language}", $default);
    }

    /**
     * Format value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    protected function formatValue($value)
    {
        return $value;
    }
}
