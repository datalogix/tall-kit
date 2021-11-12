<ul {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'aligns', $inline ? 'inline' : 'outline')
    }}
>
    @forelse ($items as $item)
        <x-nav-item
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'item') }}
            :text="$item['text'] ?? $item['title'] ?? $item"
            :active="$item['active'] ?? null"
            :href="$item['href'] ?? null"
            :target="$item['target'] ?? null"
            :click="$item['click'] ?? null"
            :icon-left="$item['iconLeft'] ?? $item['icon'] ?? null"
            :icon-right="$item['iconRight'] ?? null"
            :theme="$theme"
        />
    @empty
        {{ $slot }}
    @endforelse
</ul>
