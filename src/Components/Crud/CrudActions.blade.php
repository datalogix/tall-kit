@foreach ($actions as $route => $action)
    <x-dynamic-component :attributes="$attr('custom')->merge($action)" />
@endforeach

@if ($actionsMenuDropdown->count())
    <x-tallkit-menu-dropdown :attributes="$attr('menu-dropdown')">
        @foreach ($actionsMenuDropdown as $route => $action)
            <li>
                <x-dynamic-component :attributes="$attr('menu-dropdown-item')->merge($action)" />
            </li>
        @endforeach

        @isset ($prepend)
            <x-slot name="prepend">
                {{ $prepend }}
            </x-slot>
        @endisset

        @isset ($append)
            <x-slot name="append">
                {{ $append }}
            </x-slot>
        @endisset
    </x-tallkit-menu-dropdown>
@endif
