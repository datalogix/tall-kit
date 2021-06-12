<th {{ $attributes->mergeThemeProvider($themeProvider, 'th') }}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
        {{ $slot->isEmpty() ? __($text) : $slot }}
        {!! $attributes->mergeOnlyThemeProvider($themeProvider, 'sortable')->get($sortable) !!}
    </div>
</th>
