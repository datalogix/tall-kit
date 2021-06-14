<?php

namespace TALLKit\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string styles($config = [])
 * @method static string scripts($config = [])
 * @method static void registerAsset($name, $content = null, $overwrite = true)
 * @method static bool hasAsset($name)
 * @method static void unregisterAsset($name)
 * @method static array getAllAssets()
 * @method static string|string[] getAsset($name)
 * @method static string renderAssets()
 * @method static string registerComponent($name, $content = null, $overwrite = true)
 * @method static bool hasComponent($name)
 * @method static void unregisterComponent($name)
 * @method static array getAllComponents()
 * @method static string getComponent($name)
 * @method static string renderComponents()
 *
 * @see \TALLKit\TALLKit
 */
class TALLKit extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'tallkit';
    }
}
