<?php

namespace TALLKit\Concerns;

use Illuminate\Support\Str;

trait FieldNameAndValue
{
    use BoundValues;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    protected $realName;

    /**
     * @var string
     */
    protected $fieldKey;

    /**
     * @var string
     */
    protected $fieldName;

    /**
     * Set name.
     *
     * @param  string|null  $name
     * @return void
     */
    public function setName($name = null)
    {
        $this->name = $name;
        $this->realName = $name;
    }

    /**
     * Get field key.
     *
     * @return string
     */
    public function getFieldKey()
    {
        if (! $this->fieldKey) {
            $this->fieldKey = Str::before($this->realName, '[]');
        }

        return $this->fieldKey;
    }

    /**
     * Get field name.
     *
     * @return string
     */
    public function getFieldName()
    {
        if (! $this->fieldName) {
            $this->fieldName = Str::replace(['[', ']'], ['.', ''], $this->getFieldKey());
        }

        return $this->fieldName;
    }

    /**
     * Has name.
     *
     * @return bool
     */
    public function hasName()
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
    public function getFieldValue($bind = null, $default = null)
    {
        $default = $this->getFieldBoundValue($bind) ?: $default;

        return $this->oldFieldValue($default);
    }

    /**
     * Old field value.
     *
     * @param  mixed  $default
     * @return mixed
     */
    public function oldFieldValue($default = null)
    {
        return old($this->getFieldName(), $default);
    }

    /**
     * Get field bound value.
     *
     * @param  mixed  $bind
     * @return mixed
     */
    public function getFieldBoundValue($bind = null)
    {
        return $this->getBoundValue($bind, $this->getFieldName());
    }
}
