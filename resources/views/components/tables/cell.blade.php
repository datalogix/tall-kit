<td {{ $attributes->mergeThemeProvider($themeProvider, 'td') }}>
    {!! $slot->isEmpty() ? __($text) : $slot !!}
</td>
