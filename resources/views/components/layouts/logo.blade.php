@if ($name || $image)
    <{{ $url ? 'a' : 'span' }}
        {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
        @if ($url) href="{{ $url }}" @endif
    >
        @if ($image)
            <img
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'image') }}
                src="{{ $image }}"
                alt="{{ $name }}"
            />
        @else
            <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'name') }}>
                {{ $name }}
            </span>
        @endif
    </{{ $url ? 'a' : 'span' }}>
@endif
