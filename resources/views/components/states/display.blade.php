<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if (is_array($value) && $component = target_get($value, 'component'))
        <x-dynamic-component
            {{ $attributes->except(['class', 'style'])->merge(Arr::except($value, ['component', 'slot'])) }}
            :component="$component"
        >
            {!! target_get($value, 'slot', $slot) !!}
        </x-dynamic-component>
    @elseif (Str::endsWith($value, ['.jpg', '.jpeg', '.gif', '.png']))
        <img {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'img') }} src="{{ $value }}" />
    @elseif (Str::endsWith($value, '.mp3'))
        <audio {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'audio') }}>
            <source src="{{ $value }}" type="audio/mpeg">
        </audio>
    @elseif (Str::endsWith($value, '.mp4'))
        <video {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'video') }}>
            <source src="{{ $value }}" type="video/mp4">
        </video>
    @elseif (filter_var($value, FILTER_VALIDATE_URL))
        <x-button
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'download') }}
            href="{{ $value }}"
            preset="download"
            :theme="$theme"
        />
    @elseif ($value === true)
        <x-icon
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'check') }}
            :name="$attributes->mergeOnlyThemeProvider($themeProvider, 'check-name')->first()"
        >
            {!! $attributes->mergeOnlyThemeProvider($themeProvider, 'check-svg')->first() !!}
        </x-icon>
    @elseif ($value === false)
        <x-icon
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'uncheck') }}
            :name="$attributes->mergeOnlyThemeProvider($themeProvider, 'uncheck-name')->first()"
        >
            {!! $attributes->mergeOnlyThemeProvider($themeProvider, 'uncheck-svg')->first() !!}
        </x-icon>
    @else
        {!! $slot->isEmpty() ? $value : $slot !!}
    @endif
</div>
