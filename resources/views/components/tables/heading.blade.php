<th {{ $attributes->mergeThemeProvider($themeProvider, 'th') }}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
        {!! $slot->isEmpty() ? __($text) : $slot !!}

        @if ($sortable)
            <x-icon :name="$attributes->mergeOnlyThemeProvider($themeProvider, 'sortable')->get($sortable)['iconName']">
                {!! $attributes->mergeOnlyThemeProvider($themeProvider, 'sortable')->get($sortable)['iconSvg'] !!}
            </x-icon>
        @endif
    </div>
</th>
