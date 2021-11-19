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

    @if ($paginator)
        {{ $paginator->withQueryString()->links() }}
    @endif
</div>
