<?php

namespace TALLKit\Components\Markdown;

use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Toc extends BladeComponent
{
    protected array $props = [
        'url' => null,
        'min' => 2,
        'max' => 3,
    ];

    protected function attrs()
    {
        return [
            'root' => Attr::make(),

            'item' => Attr::make(),

            'sub' => Attr::make(),

            'link' => Attr::make(),
        ];
    }

    public function items($markdown)
    {
        // Remove code blocks which might contain headers.
        $markdown = preg_replace('(```[a-z]*\n[\s\S]*?\n```)', '', $markdown);

        return collect(explode(PHP_EOL, $markdown))
            ->filter(function ($line) {
                for ($c = $this->min; $c <= $this->max; $c++) {
                    if (str($line)->trim()->startsWith(str('#')->repeat($c).' ')) {
                        return true;
                    }
                }

                return false;
            })
            ->map(fn ($line) => [
                'level' => str($line)->before('# ')->trim()->length() + 1,
                'title' => $title = str($line)->after('# ')->trim(),
                'anchor' => str($title)->slug(),
            ]);
    }
}
