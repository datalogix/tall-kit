<tr {{ $attributes->merge($themeProvider->tr->toArray()) }}>
    {{ $slot->isEmpty() ? __($text) : $slot }}
</tr>
