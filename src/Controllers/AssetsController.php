<?php

namespace TALLKit\Controllers;

use TALLKit\Facades\TALLKit;

class AssetsController
{
    use CanPretendToBeAFile;

    /**
     * Source.
     *
     * @param  string  $path
     * @return \Illuminate\Http\Response
     */
    public function source($path)
    {
        return $this->pretendResponseIsFile(__DIR__.'/../../dist/'.$path);
    }

    /**
     * Component.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function component($name)
    {
        $component = TALLKit::getComponent($name);
        $pos = request()->get('pos', 0);
        $file = target_get($component, $pos);

        return $this->pretendResponseIsFile(explode('?', $file)[0]);
    }
}
