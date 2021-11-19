<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    <x-table
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'table') }}
        :cols="$cols"
        :rows="$rows"
        :footer="$footer"
        :empty-text="$emptyText"
        :theme="$theme"
    >
        {{ $slot }}

        @foreach ($cols as $key => $col)
            @php
            $colName = 'col_'.(is_int($key) ? $col : $key);
            $action = isset(${$colName}) ? ${$colName} : null;
            @endphp

            @isset ($action)
                @scopedslot($colName, ($row), ($action))
                    {{ $action($row) }}
                @endscopedslot
            @endisset
        @endforeach

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
    </x-table>

    @if ($paginator instanceof \Illuminate\Contracts\Pagination\Paginator)
        {{ $paginator->withQueryString()->links() }}
    @endif
</div>
