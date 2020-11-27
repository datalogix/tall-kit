<tr {{ $attributes->merge(toArray($themeProvider->tr)) }}>
    {{ $slot->isEmpty() ? __($text) : $slot }}
</tr>
