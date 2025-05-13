<div {{ $attrs() }}>
    @isset ($header)
        {{ $header }}
    @else
        <x-tallkit-crud-header
            :title="$title"
            :attributes="$attrs('header')"
            :props="$props('header')"
            :theme="$theme"
        >
            @isset ($actionsHeader)
                {{ $actionsHeader }}
            @elseif (isset($actionsIndex))
                {{ $actionsIndex }}
            @else
                @if($route = route_detect([$prefix.'.create-many', $prefix.'.new-many', $prefix.'.form-many'], $parameters, null))
                    @can(['create-many', 'new-many', 'form-many'], $model)
                        <x-tallkit-button
                            preset="create-many"
                            :text="$tooltip ? '' : null"
                            :tooltip="$tooltip"
                            :href="$route"
                            :attributes="$attrs('create-many')"
                            :props="$props('create-many')"
                            :theme="$theme"
                        />
                    @endcan
                @endif

                @if($route = route_detect([$prefix.'.create', $prefix.'.new', $prefix.'.form'], $parameters, null))
                    @can(['create', 'new', 'form'], $model)
                        <x-tallkit-button
                            preset="create"
                            :text="$tooltip ? '' : null"
                            :tooltip="$tooltip"
                            :href="$route"
                            :attributes="$attrs('create')"
                            :props="$props('create')"
                            :theme="$theme"
                        />
                    @endcan
                @endif
            @endisset
        </x-tallkit-crud-header>
    @endisset

    {{ $slot }}

    @isset($datatable)
        {{ $datatable }}
    @else
        <x-tallkit-datatable
            :search="$search"
            :search-default="$searchDefault"
            :search-values="$searchValues"
            :search-modelable="$searchModelable"
            :cols="$cols"
            :resource="$resource"
            :footer="$footer"
            :empty-text="$emptyText"
            :paginator-position="$paginatorPosition"
            :order-by="$orderBy"
            :order-by-direction="$orderByDirection"
            :attributes="$attrs('datatable')"
            :props="$props('datatable')"
            :theme="$theme"
        >
            @foreach ($cols as $keyCol => $col)
                @php
                $colname = 'col_'.target_get($col, 'name', is_int($keyCol) ? $col : $keyCol);
                $action = isset(${$colname}) ? ${$colname} : null;
                @endphp

                @if ($displayActionsColumn && $colname === 'col_actions')
                    @scopedslot('col_actions', ($row), (
                        $attributes,
                        $themeProvider,
                        $prefix,
                        $key,
                        $title,
                        $parameters,
                        $forceMenu,
                        $maxActions,
                        $actions,
                        $routeName,
                        $tooltip,
                        $theme
                    ))
                        <div {{ $attrs('row-actions') }}>
                            <x-tallkit-crud-actions
                                :prefix="$prefix"
                                :key="$key"
                                :title="$title"
                                :parameters="array_merge($parameters, [$row])"
                                :resource="$row"
                                :force-menu="$forceMenu"
                                :max-actions="$maxActions"
                                :actions="$actions"
                                :route-name="$routeName"
                                :tooltip="$tooltip ?? true"
                                :attributes="$attrs('actions')"
                                :props="$attrs('props')"
                                :theme="$theme"
                            />
                        </div>
                    @endscopedslot

                    @continue
                @endif

                @isset ($action)
                    @scopedslot($colname, ($row), ($action))
                        {{ $action($row) }}
                    @endscopedslot
                @endisset
            @endforeach

            @isset ($searchFields)
                <x-slot name="searchFields">
                    {{ $searchFields }}
                </x-slot>
            @endisset

            @isset ($searchSubmit)
                <x-slot name="searchSubmit">
                    {{ $searchSubmit }}
                </x-slot>
            @endisset

            @isset ($head)
                <x-slot name="head">
                    {{ $head }}
                </x-slot>
            @endisset

            @isset ($body)
                <x-slot name="body">
                    {{ $body }}
                </x-slot>
            @endisset

            @isset ($empty)
                <x-slot name="empty">
                    {{ $empty }}
                </x-slot>
            @endisset

            @isset ($foot)
                <x-slot name="foot">
                    {{ $foot }}
                </x-slot>
            @endisset
        </x-tallkit-datatable>
    @endisset
</div>

{{ $endFormDataBinder() }}
