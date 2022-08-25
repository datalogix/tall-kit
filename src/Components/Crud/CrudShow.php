<?php

namespace TALLKit\Components\Crud;

class CrudShow extends Crud
{
    /**
     * @var string|bool|null
     */
    public $back;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $prefix
     * @param  string|null  $key
     * @param  string|bool|null  $title
     * @param  mixed  $parameters
     * @param  mixed  $resource
     * @param  bool|null  $forceMenu
     * @param  int|null  $maxActions
     * @param  mixed  $actions
     * @param  string|bool|null  $routeName
     * @param  string|bool|null  $tooltip
     * @param  string|bool|null  $back
     * @param  string|null  $theme
     * @return void
     */
    public function __construct(
        $prefix = null,
        $key = null,
        $title = null,
        $parameters = null,
        $resource = null,
        $forceMenu = null,
        $maxActions = null,
        $actions = null,
        $routeName = null,
        $tooltip = null,
        $back = null,
        $theme = null
    ) {
        parent::__construct(
            $prefix,
            $key,
            $title,
            $parameters,
            $resource,
            $forceMenu ?? true,
            $maxActions,
            $actions,
            $routeName,
            $tooltip,
            $theme
        );

        if ($this->resourceTitle) {
            $this->title = $title ?? __($this->title).' - '.$this->resourceTitle;
        }

        $this->back = $back ?? (url()->current() === url()->previous() ? route_detect($this->prefix.'.index', null, null) : null);
    }
}
