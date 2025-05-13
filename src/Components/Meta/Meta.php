<?php

namespace TALLKit\Components\Meta;

use TALLKit\View\BladeComponent;

class Meta extends BladeComponent
{
    protected function props(): array
    {
        return [
            'title' => config('app.name'),
            'description' => config('app.description'),
            'keywords' => config('app.keywords'),
            'author' => config('app.author'),
            'robots' => 'index, follow',
            'type' => 'website',
            'card' => 'summary_large_image',
            'image' => find_image('meta-image'),
            'url' => url()->current(),
            'locale' => app()->getLocale(),
        ];
    }
}
