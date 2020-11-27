<th {{ $attributes->merge(toArray($themeProvider->th)) }}>
    <div {{ $themeProvider->container }}>
        {{ $slot->isEmpty() ? __($text) : $slot }}

        @if($sortable)
            {!! $themeProvider->sortable[$sortable] ?? '' !!}
        @endif
    </div>
</th>
