<?php

namespace TALLKit;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use JsonSerializable;

class Notify implements Arrayable, JsonSerializable
{
    /**
     * The attributes contained in the notify.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $attributes = [];

    /**
     * The global notify key.
     *
     * @var string
     */
    protected static $key = 'notify';

    /**
     * Create a new notify instance.
     *
     * @param  \Illuminate\Support\Collection|array|mixed  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = Collection::wrap($attributes);
    }

    /**
     * Get global notify key.
     *
     * @return string
     */
    public static function getNotifyKey()
    {
        return self::$key;
    }

    /**
     * Set global notify key.
     *
     * @param  string  $key
     * @return void
     */
    public static function setNotifyKey($key)
    {
        self::$key = $key;
    }

    /**
     * Dynamically handle calls into the notify instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return new self(['type' => $name]);
    }

    /**
     * Dynamically bind parameters to the notify.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return $this
     */
    public function __call($name, $arguments)
    {
        $this->attributes = $this->attributes->merge([
            $name => empty($arguments) ? true : $arguments[0],
        ]);

        return $this;
    }

    /**
     * Handle the object's destruction.
     *
     * @return void
     */
    public function __destruct()
    {
        $key = $this->attributes->get('key', self::getNotifyKey());

        session()->flash($key.'.'.count(session($key, [])), $this->toArray());
    }

    /**
     * Convert the notify to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->attributes->all();
    }

    /**
     * Get the JSON serializable representation of the object.
     *
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->attributes->all();
    }
}
