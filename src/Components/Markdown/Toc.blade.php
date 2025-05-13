@php($previousLevel = $min)

<ul {{ $attr() }}>
    <li {{ $attr('item') }}>
        @foreach ($items($slot) as $item)
            @if (! $loop->first)
                @if ($item['level'] > $previousLevel)
                    <ul {{ $attr('sub') }}>
                        <li {{ $attr('item') }}>
                @endif

                @if ($item['level'] < $previousLevel)
                        </li>
                    </ul>
                @endif

                @if ($item['level'] <= $previousLevel)
                    </li>
                    <li {{ $attr('item') }}>
                @endif
            @endif

            <a href="{{ $url }}#{{ $item['anchor'] }}" {{ $attr('link') }}>
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
