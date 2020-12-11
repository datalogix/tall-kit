<div {{ $themeProvider->container }}>
    @if(isset($logo))
        <div {{ $themeProvider->logo }}>
            {{ $logo }}
        </div>
    @endif

    <div {{ $attributes->merge(toArray($themeProvider->card)) }}>
        {{ $slot }}
    </div>
</div>
