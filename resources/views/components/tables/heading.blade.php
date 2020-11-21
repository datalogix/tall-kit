<th {{ $attributes->merge($themeProvider->th->toArray()) }}>
    {{ $slot->isEmpty() ? __($text) : $slot }}

    @if($sortable)
        {!! $themeProvider->sortable[$sortable] ?? '' !!}
    @endif
</th>
