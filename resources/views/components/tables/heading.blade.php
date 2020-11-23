<th {{ $attributes->merge($themeProvider->th->toArray()) }}>
    <div {{ $themeProvider->container }}>
        {{ $slot->isEmpty() ? __($text) : $slot }}

        @if($sortable)
            {!! $themeProvider->sortable[$sortable] ?? '' !!}
        @endif
    </div>
</th>
