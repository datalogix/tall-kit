<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if ($src)
        <img
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'image') }}
            src="{{ $src }}"
        />
    @endif

    @if ($icon !== false)
        <x-icon
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'icon') }}
            :name="$icon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'iconName')->first()"
        >
            {!! $slot->isEmpty() ? $attributes->mergeOnlyThemeProvider($themeProvider, 'iconSvg')->first() : $slot !!}
        </x-icon>
    @else
        @isset ($loading)
            {{ $loading }}
        @elseif ($loadingIcon !== false)
            <x-icon
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loadingIcon') }}
                :name="$loadingIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'loadingIconName')->first()"
            >
                {!! $loadingIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'loadingIconSvg')->first() !!}
            </x-icon>
        @endisset

        @isset ($error)
            {{ $error }}
        @elseif ($errorIcon !== false)
            <x-icon
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'errorIcon') }}
                :name="$errorIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'errorIconName')->first()"
            >
                {!! $errorIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'errorIconSvg')->first() !!}
            </x-icon>
        @endisset
    @endisset
</div>
