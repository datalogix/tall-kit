<?php

namespace TALLKit\Components\Message;

use TALLKit\Notify;
use TALLKit\View\BladeComponent;

class Messages extends BladeComponent
{
    protected function props(): array
    {
        return [
            'session' => Notify::getNotifyKey(),
        ];
    }

    protected function processed(array $data)
    {
        $this->messages = collect(session($this->session))->sortKeysDesc();
        $this->setVariables('messages');
    }
}
