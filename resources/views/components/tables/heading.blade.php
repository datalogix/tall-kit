<th {{ $attributes->mergeThemeProvider($themeProvider, 'th') }}>
    <{{ $sortable ? 'a' : 'div'}} {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'container')
            ->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)
            ->merge($sortableAction())
     }}>
        {!! $slot->isEmpty() ? __($name) : $slot !!}

        @if ($sortable === 'asc' || $sortable === 'desc')
            <x-icon :name="$attributes->mergeOnlyThemeProvider($themeProvider, 'sortable')->get($sortable)['icon-name']">
                {!! $attributes->mergeOnlyThemeProvider($themeProvider, 'sortable')->get($sortable)['icon-svg'] !!}
            </x-icon>
        @endif
    </{{ $sortable ? 'a' : 'div'}}>
</th>
