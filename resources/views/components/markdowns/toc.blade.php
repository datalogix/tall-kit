@php($previousLevel = $min)

<ul {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    <li {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'item') }}>
        @foreach ($items($slot) as $item)
            @if (! $loop->first)
                @if ($item['level'] > $previousLevel)
                    <ul {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'sub') }}>
                        <li {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'item') }}>
                @endif

                @if ($item['level'] < $previousLevel)
                        </li>
                    </ul>
                @endif

                @if ($item['level'] <= $previousLevel)
                    </li>
                    <li {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'item') }}>
                @endif
            @endif

            <a href="{{ $url }}#{{ $item['anchor'] }}" {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'link') }}>
                {{ $item['title'] }}
            </a>

            @if ($loop->last && $item['level'] === $max)
                    </li>
                </ul>
            @endif

            @php($previousLevel = $item['level'])
        @endforeach
    </li>
</ul>
