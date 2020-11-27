<?php

namespace Datalogix\TALLKit\Concerns;

trait Assets
{
    /**
     * The assets of component.
     *
     * @var array
     */
    protected static $assets = [];

    /**
     * Returns assets of component.
     *
     * @return array
     */
    public static function assets()
    {
        return static::$assets;
    }
}
