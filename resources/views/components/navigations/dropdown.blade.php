<div x-data="{ open: false }" @click.away="open = false" {{ $themeProvider->container }}>
    <div @click="open = !open" {{ $themeProvider->trigger }}>
        {{ $trigger }}
    </div>

    <div x-show="open" {{ $attributes->merge($themeProvider->dropdown->toArray()) }}>
        {{ $slot }}
    </div>
</div>
