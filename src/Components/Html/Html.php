<?php

namespace TALLKit\Components\Html;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Html extends BladeComponent
{
    protected function props(): array
    {
        return [
            'lang' => str_replace('_', '-', app()->getLocale()),
            'title' => config('app.name'),
            'charset' => 'utf-8',
            'viewport' => 'width=device-width, initial-scale=1',
            'csrfToken' => true,
            'meta' => true,
            'metaTags' => [],
            'googleFonts' => null,
            'googleAnalytics' => true,
            'googleTagManager' => true,
            'facebookPixelCode' => true,
            'livewire' => class_exists('\Livewire\Livewire'),
            'styles' => [],
            'scripts' => [],
            'stackStyles' => 'styles',
            'stackScripts' => 'scripts',
            'vite' => [
                'resources/css/app.css',
                'resources/css/app.sass',
                'resources/css/app.scss',
                'resources/js/app.js',
                'resources/js/app.ts',
            ],
            'viteBuildDirectory' => 'build',
            'tailwindcss' => null,
            'alpine' => null,
            'tallkit' => true,
            'components' => [
                // TODO: review
                //'tallkit-user-sidebar' => [
                //    'guard' => 'admin',
                //    'target' => '_blank',
                //],
            ],
            'typekit' => null,
        ];
    }

    protected function processed($data)
    {
        $this->googleFonts = is_string($this->googleFonts) ? ['families' => $this->googleFonts] : $this->googleFonts;
        $this->vite = collect($this->vite)->filter(fn ($file) => file_exists(base_path($file)))->unique();
        $this->components = collect($this->components)->filter(fn ($component) => !target_get($component, 'disabled'));
        $this->tallkit = $this->tallkit ? array_replace_recursive(
            collect($this->tallkit)->toArray(),
            is_bool($this->tailwindcss) ? ['options' => ['inject' => ['tailwindcss' => $this->tailwindcss]]] : [],
            ['options' => ['inject' => ['alpine' => is_bool($this->alpine) ? $this->alpine : !$this->livewire]]],
        ) : false;
    }

    protected function attrs()
    {
        return [
            'html' => Attr::make(attributes: ['lang' => $this->lang]),

            'head' => Attr::make(),

            'body' => Attr::make(),

            'components' => Attr::make(),
        ];
    }
}
