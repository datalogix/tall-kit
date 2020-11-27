<div x-data="{ open: false }" @click.away="open = false" {{ $themeProvider->container }}>
    <div @click="open = !open" {{ $themeProvider->trigger }}>
        {{ $trigger }}
    </div>

    <div x-show="open" {{ $attributes->merge(toArray($themeProvider->dropdown)) }}>
        {{ $slot }}
    </div>
</div>
