<td {{ $attributes->mergeThemeProvider($themeProvider, 'td') }}>
    <div {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'container')
            ->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)
     }}>
        {!! $slot->isEmpty() ? __($text) : $slot !!}
    </div>
</td>
