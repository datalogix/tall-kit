@php($previousLevel = $min)

<ul {{ $attrs() }}>
    <li {{ $attrs('item') }}>
        @foreach ($items($slot) as $item)
            @if (! $loop->first)
                @if ($item['level'] > $previousLevel)
                    <ul {{ $attrs('sub') }}>
                        <li {{ $attrs('item') }}>
                @endif

                @if ($item['level'] < $previousLevel)
                        </li>
                    </ul>
                @endif

                @if ($item['level'] <= $previousLevel)
                    </li>
                    <li {{ $attrs('item') }}>
                @endif
            @endif

            <a href="{{ $url }}#{{ $item['anchor'] }}" {{ $attrs('link') }}>
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
