<?php

namespace Datalogix\TALLKit;

use Illuminate\Support\Str;

class TALLKit
{
    /**
     * Styles registered.
     *
     * @var array
     */
    private static $styles = [];

    /**
     * Scripts registered.
     *
     * @var array
     */
    private static $scripts = [];

    /**
     * Add style.
     *
     * @param  string  $style
     * @return void
     */
    public static function addStyle($style)
    {
        if (! in_array($style, static::$styles)) {
            static::$styles[] = $style;
        }
    }

    /**
     * Returns styles registered.
     *
     * @return array
     */
    public static function styles()
    {
        return static::$styles;
    }

    /**
     * Output styles.
     *
     * @return string
     */
    public static function outputStyles()
    {
        return collect(static::$styles)->map(function ($style) {
            return '<link href="'.$style.'" rel="stylesheet" />';
        })->implode(PHP_EOL);
    }

    /**
     * Add script.
     *
     * @param  string  $scripts
     * @return void
     */
    public static function addScript($script)
    {
        if (! in_array($script, static::$scripts)) {
            static::$scripts[] = $script;
        }
    }

    /**
     * Returns scripts registered.
     *
     * @return array
     */
    public static function scripts()
    {
        return static::$scripts;
    }

    /**
     * Output scripts.
     *
     * @return string
     */
    public static function outputScripts()
    {
        return collect(static::$scripts)->map(function ($script) {
            if (Str::endsWith($script, '.js')) {
                return '<script src="'.$script.'"></script>';
            }

            return '<script>'.$script.'</script>';
        })->implode(PHP_EOL);
    }
}
