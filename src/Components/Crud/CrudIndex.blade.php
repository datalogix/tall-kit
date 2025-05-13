<div {{ $attr() }}>
    @isset ($header)
        {{ $header }}
    @else
        <x-tallkit-crud-header :attributes="$attr('header')">
            @isset ($actionsHeader)
                {{ $actionsHeader }}
            @elseif (isset($actionsIndex))
                {{ $actionsIndex }}
            @else
                @if($route = route_detect([$prefix.'.create-many', $prefix.'.new-many', $prefix.'.form-many'], $parameters, null))
                    @can(['create-many', 'new-many', 'form-many'], $model)
                        <x-tallkit-button :attributes="$attr('create-many')" />
                    @endcan
                @endif

                @if($route = route_detect([$prefix.'.create', $prefix.'.new', $prefix.'.form'], $parameters, null))
                    @can(['create', 'new', 'form'], $model)
                        <x-tallkit-button :attributes="$attr('create')" />
                    @endcan
                @endif
            @endisset
        </x-tallkit-crud-header>
    @endisset

    {{ $slot }}

    @isset($datatable)
        {{ $datatable }}
    @else
        <x-tallkit-datatable :attributes="$attr('datatable')">
            @foreach ($cols as $keyCol => $col)
                @php
                $colname = 'col_'.target_get($col, 'name', is_int($keyCol) ? $col : $keyCol);
                $action = isset(${$colname}) ? ${$colname} : null;
                @endphp

                @if ($displayActionsColumn && $colname === 'col_actions')
                    @scopedslot('col_actions', ($row))
                        <div {{ $attr('row-actions') }}>
                            <x-tallkit-crud-actions :attributes="$attr('actions')->merge(['resource' => $row, 'parameters' => array_merge($parameters, [$row])])" />
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
