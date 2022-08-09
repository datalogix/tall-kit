<?php

namespace TALLKit\Controllers;

use TALLKit\Facades\TALLKit;

class JavaScriptAssets
{
    use CanPretendToBeAFile;

    /**
     * JavaScript source.
     *
     * @return \Illuminate\Http\Response
     */
    public function source($path)
    {
        return $this->pretendResponseIsFile(__DIR__.'/../../dist/'.$path);
    }

    /**
     * JavaScript component.
     *
     * @param  string  $component
     * @return \Illuminate\Http\Response
     */
    public function component($name)
    {
        $file = explode('?', TALLKit::getComponent($name))[0];

        return $this->pretendResponseIsFile($file);
    }
}
