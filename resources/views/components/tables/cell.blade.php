<td {{ $attributes->merge($themeProvider->td->toArray()) }}>
    {{ $slot->isEmpty() ? __($text) : $slot }}
</td>
