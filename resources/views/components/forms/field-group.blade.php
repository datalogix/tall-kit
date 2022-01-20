<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if (isset($prepend) || $prependText || $prependIcon)
        <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'prepend') }}>
            {{ $prepend ?? '' }}
            {{ $prependText ?? '' }}
            <x-icon :name="$prependIcon" />
        </span>
    @endif

    <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'field') }}>
        {{ $slot }}
    </span>

    @if (isset($append) || $appendText || $appendIcon)
        <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'prepend') }}>
            {{ $append ?? '' }}
            {{ $appendText ?? '' }}
            <x-icon :name="$appendIcon" />
        </span>
    @endif
</div>
