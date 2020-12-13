<div {{ $themeProvider->container }}>
    <div {{ $themeProvider->overlay }}>
        <div {{ $themeProvider->backdrop }}></div>
    </div>

    <div {{ $attributes->merge(toArray($themeProvider->modal)) }}>
        {{ $slot }}
    </div>
</div>
