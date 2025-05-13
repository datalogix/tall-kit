<?php

namespace TALLKit\Components\LogoutButton;

use TALLKit\View\BladeComponent;

class LogoutButton extends BladeComponent
{
    protected function attrs()
    {
        return [
            'root' => [
                'text' => 'Log out',
                'action' => route_detect(['logout', 'auth.logout'])
            ],
        ];
    }
}
