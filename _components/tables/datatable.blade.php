<div {{ $attrs() }}>
    @if ($search->isNotEmpty())
        <x-tallkit-card
            :attributes="$attrs('search')"
            :props="$props('search')"
            :theme="$theme"
        >
            <x-tallkit-form
                method="get"
                :fields="$search"
                :bind="$searchValues"
                :modelable="$searchModelable"
                :attributes="$attrs('search-fields')"
                :props="$props('search-fields')"
                :theme="$theme"
            >
                {{ $searchFields ?? '' }}

                @isset ($searchSubmit)
                    {{ $searchSubmit }}
                @elseif (! $isWired() || $wireModifier() === '.defer')
                    <div {{ $attrs('search-submit') }}>
                        <x-tallkit-submit
                            preset="search"
                            :attributes="$attrs('search-submit-button')"
                            :props="$props('search-submit-button')"
                            :theme="$theme"
                        />
                    </div>
                @endif
            </x-tallkit-form>

            {{ $endFormDataBinder() }}
        </x-tallkit-card>
    @endif

    @if (in_array($paginatorPosition, ['both', 'top']) && $paginator instanceof \Illuminate\Contracts\Pagination\Paginator)
        {{ $paginator->withQueryString()->links() }}
    @endif

    <x-tallkit-table
        :cols="$cols"
        :rows="$rows"
        :footer="$footer"
        :empty-text="$emptyText"
        :attributes="$attrs('table')"
        :props="$props('table')"
        :theme="$theme"
    >
        {{ $slot }}

        @foreach ($cols as $key => $col)
            @php
            $colname = 'col_'.target_get($col, 'name', is_int($key) ? $col : $key);
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
    </x-tallkit-table>

    @if (in_array($paginatorPosition, ['both', 'bottom']) && $paginator instanceof \Illuminate\Contracts\Pagination\Paginator)
        {{ $paginator->withQueryString()->links() }}
    @endif
</div>
