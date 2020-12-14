<div {{ $themeProvider->container->merge($themeProvider->aligns->get($align, [])) }}>
    <div {{ $themeProvider->overlay }}>
        <div {{ $themeProvider->backdrop }}></div>
    </div>

    <div {{ $attributes->merge(toArray($themeProvider->modal->merge($themeProvider->transitions->get($align, [])))) }}>
        {{ $slot }}
    </div>
</div>
