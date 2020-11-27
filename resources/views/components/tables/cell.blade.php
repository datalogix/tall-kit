<td {{ $attributes->merge(toArray($themeProvider->td)) }}>
    {{ $slot->isEmpty() ? __($text) : $slot }}
</td>
