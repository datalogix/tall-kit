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
            <div {{ $attributes->mergeThemeProvider($themeProvider, 'loading') }}>
                {{ $loading }}
            </div>
        @else
            <x-loading
                {{ $attributes->mergeThemeProvider($themeProvider, 'loading') }}
                :text="false"
            />
        @endisset

        @isset ($error)
            <div {{ $attributes->mergeThemeProvider($themeProvider, 'error') }}>
                {{ $error }}
            </div>
        @else
            <x-error
                {{ $attributes->mergeThemeProvider($themeProvider, 'error') }}
                :text="false"
            />
        @endisset
    @endisset
</div>
