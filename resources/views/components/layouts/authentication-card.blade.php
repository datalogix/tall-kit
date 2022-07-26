@if (is_array($html))
    <x-html :options="$html">
    @isset ($head)
        <x-slot name="head">
            {{ $head }}
        </x-slot>
    @endisset
@endif
<div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header') }}>
        <x-logo
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'logo') }}
            :image="$logoImage"
            :name="$logoName"
            :url="$logoUrl"
            :theme="$theme"
        >
            {{ $logo ?? '' }}
        </x-logo>
    </div>

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'card') }}>
        <x-message
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'message') }}
            :session="$messageSession"
            :theme="$theme"
        />

        {{ $slot }}
    </div>
</div>
@if (is_array($html))
    </x-html>
@endif
