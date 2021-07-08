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
        {{ $slot }}
    </div>
</div>
