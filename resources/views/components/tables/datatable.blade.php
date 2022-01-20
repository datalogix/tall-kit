<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if ($search->isNotEmpty())
        <x-card {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'search') }}>
            <x-form
                {{
                    $attributes
                        ->mergeOnlyThemeProvider($themeProvider, 'search-fields')
                        ->mergeOnlyThemeProvider($themeProvider, 'search-cols', $search->count())
                }}
                method="GET"
                :fields="$search"
                :bind="request()"
            >
                {{ $searchFields ?? '' }}

                @isset ($searchSubmit)
                    {{ $searchSubmit }}
                @else
                    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'search-submit') }}>
                        <x-submit preset="search" />
                    </div>
                @endif
            </x-form>
        </x-card>
    @endif

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
            $colname = 'col_'.data_get($col, 'name', is_int($key) ? $col : $key);
            $action = isset(${$colname}) ? ${$colname} : null;
            @endphp

            @isset ($action)
                @scopedslot($colname, ($row), ($action))
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
