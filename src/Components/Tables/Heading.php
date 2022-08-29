<?php

namespace TALLKit\Components\Tables;

use Illuminate\Support\Str;
use TALLKit\Components\BladeComponent;

class Heading extends BladeComponent
{
    /**
     * @var string|null
     */
    public $name;

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
     * @param  string|null  $name
     * @param  string|bool|null  $align
     * @param  string|bool|null  $sortable
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $name = null,
        $align = null,
        $sortable = null,
        $theme = null
    ) {
        parent::__construct($theme);

        $this->name = $name;
        $this->align = $align ?? 'left';

        if ($sortable) {
            $orderBy = Str::lower(request('orderBy'));
            $orderByDirection = Str::lower(request('orderByDirection', 'asc'));

            $this->sortable = $orderBy === $this->name ? $orderByDirection : Str::lower($sortable);
        }
    }

    /**
     * Sortable action.
     *
     * @return array
     */
    public function sortableAction()
    {
        if (! $this->sortable || ! isset($this->name)) {
            return [];
        }

        $sortable = $this->sortable === 'asc' ? 'desc' : 'asc';

        if ($this->isWired()) {
            return [
                'class' => 'cursor-pointer',
                'wire:click' => 'updateOrderBy(\''.$this->name.'\', \''.$sortable.'\')',
            ];
        }

        return [
            'href' => request()->fullUrlWithQuery([
                'orderBy' => $this->name,
                'orderByDirection' => $sortable,
            ]),
        ];
    }
}
