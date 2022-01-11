<?php

namespace TALLKit\Components\Tables;

use TALLKit\Components\BladeComponent;
use Illuminate\Support\Str;

class Heading extends BladeComponent
{
    /**
     * @var string|null
     */
    public $text;

    /**
     * @var string
     */
    public $align;

    /**
     * @var string|bool
     */
    public $sortable;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $text
     * @param  string|bool|null  $align
     * @param  string|bool|null  $sortable
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $text = null,
        $align = null,
        $sortable = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->text = $text;
        $this->align = $align ?: 'left';
        $this->sortable = Str::lower($sortable) ?: true;
    }

    /**
     * Generate url sortable with order by and direction.
     *
     * @param  string|null  $orderby
     * @param  string|null  $direcion
     * @return string
     */
    public function url($orderby = null, $direcion = null)
    {
        $orderby = $orderby ?: $this->text;
        $direction = $direcion ?: ($this->sortable === 'asc' ? 'desc' : 'asc');

       return request()->fullUrlWithQuery(compact('orderby', 'direction'));
    }
}
