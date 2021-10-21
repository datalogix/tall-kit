<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if (Str::endsWith($value, ['.jpg', '.jpeg', '.gif', '.png']))
        <img {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'types', 'img') }} src="{{ $value }}" />
    @elseif (Str::endsWith($value, '.mp3'))
        <audio {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'types', 'audio') }}>
            <source src="{{ $value }}" type="audio/mpeg">
        </audio>
    @elseif (Str::endsWith($value, '.mp4'))
        <video {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'types', 'video') }}>
            <source src="{{ $value }}" type="video/mp4">
        </video>
    @elseif (filter_var($value, FILTER_VALIDATE_URL))
        <x-button
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'types', 'download') }}
            href="{{ $value }}"
            preset="download"
        />
    @else
        {{ $slot->isEmpty() ? $value : $slot }}
    @endif
</div>
