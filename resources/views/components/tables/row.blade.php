<tr {{ $attributes->mergeThemeProvider($themeProvider, 'tr') }}>
    {{ $slot->isEmpty() ? __($text) : $slot }}
</tr>
