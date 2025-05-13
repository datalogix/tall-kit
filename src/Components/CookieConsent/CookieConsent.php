<?php

namespace TALLKit\Components\CookieConsent;

use TALLKit\View\BladeComponent;

class CookieConsent extends BladeComponent
{
    protected array $props = [
        'name' => 'cookie-consent',
        'show' => false,
        'overlay' => false,
        'closeable' => false,
        'align' => 'bottom-right',
        'transition' => 'bottom',
        'expires' => 365,
        'title' => 'This site uses cookies',
        'subtitle' => null,
        'description' => 'Hi! Our website uses cookies so that we can optimize the service we provide you. By using our website, you agree to their use.',
        'url' => null,
        'more' => 'To learn more, read our cookie policy.',
        'confirm' => 'I agree',
    ];

    protected function processed(array $data)
    {
        $this->url ??= route_detect(['cookie-privacy', 'privacy-policy']);
    }

    protected function attrs()
    {
        return [
            'root' => [
                'x-cloak' => '',
                'x-data' => 'window.tallkit.component(\'cookie-consent\')',
                'x-init' => 'setup(\''.$this->name.'\', '.$this->expires.')',
                '@'.$this->name.'-open.window' => 'open',
                '@'.$this->name.'-close.window' => 'close',
                '@'.$this->name.'-toggle.window' => 'toggle',
            ],

            'modal' => [
                // TODO
                // 'theme:box.except.@keydown.escape.window' => 'true',
                // 'theme:box.except.@keydown.tab.prevent' => 'true',
                // 'theme:box.except.@keydown.shift.tab.prevent' => 'true',
                'class' => 'border p-4',
                'name' => $this->name.'-modal',
                'overlay' => $this->overlay,
                'closeable' => $this->closeable,
                'align' => $this->align,
                'transition' => $this->transition,
            ],

            'section' => [
                'title' => $this->title,
                'subtitle' => $this->subtitle
            ],

            'content' => [
                'class' => 'mb-2',
            ],

            'link' => [
                'class' => 'underline',
                'href' => $this->url,
            ],

            'button' => [
                ':click' => '$dispatch(\''.$this->name.'-close\')',
                'text' => $this->confirm
            ],
        ];
    }
}
