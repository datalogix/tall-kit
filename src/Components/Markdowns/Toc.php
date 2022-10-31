<?php

namespace TALLKit\Components\Markdowns;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use TALLKit\Components\BladeComponent;

class Toc extends BladeComponent
{
    /**
     * @var string|null
     */
    public $url;

    /**
     * @var int
     */
    public $min;

    /**
     * @var int
     */
    public $max;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $url
     * @param  int|null  $min
     * @param  int|null  $max
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $url = null,
        $min = 2,
        $max = 3,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->url = $url;
        $this->min = $min ?? 2;
        $this->max = $max ?? 3;
    }

    /**
     * Items.
     *
     * @param  string  $markdown
     * @return \Illuminate\Support\Collection
     */
    public function items($markdown)
    {
        // Remove code blocks which might contain headers.
        $markdown = preg_replace('(```[a-z]*\n[\s\S]*?\n```)', '', $markdown);

        return Collection::wrap(explode(PHP_EOL, $markdown))
            ->filter(function ($line) {
                for ($c = $this->min; $c <= $this->max; $c++) {
                    if (Str::startsWith(trim($line), Str::repeat('#', $c).' ')) {
                        return true;
                    }
                }

                return false;
            })
            ->map(function ($line) {
                return [
                    'level' => strlen(trim(Str::before($line, '# '))) + 1,
                    'title' => $title = trim(Str::after($line, '# ')),
                    'anchor' => Str::slug($title),
                ];
            });
    }
}
