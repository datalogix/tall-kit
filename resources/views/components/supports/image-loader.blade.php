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
            :name="$icon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'icon-name')->first()"
        >
            {!! $slot->isEmpty() ? $attributes->mergeOnlyThemeProvider($themeProvider, 'icon-svg')->first() : $slot !!}
        </x-icon>
    @else
        @isset ($loading)
            {{ $loading }}
        @elseif ($loadingIcon !== false)
            <x-icon
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading-icon') }}
                :name="$loadingIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'loading-icon-name')->first()"
            >
                {!! $loadingIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'loading-icon-svg')->first() !!}
            </x-icon>
        @endisset

        @isset ($error)
            {{ $error }}
        @elseif ($errorIcon !== false)
            <x-icon
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'error-icon') }}
                :name="$errorIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'error-icon-name')->first()"
            >
                {!! $errorIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'error-icon-svg')->first() !!}
            </x-icon>
        @endisset
    @endisset
</div>
