<div {{ $themeProvider->container }}>
    <div {{ $themeProvider->trigger }}>
        {{ $trigger }}
    </div>

    <div {{ $attributes->merge(toArray($themeProvider->dropdown)) }}>
        {{ $slot }}
    </div>
</div>
