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
            :icon-left="$item['icon-left'] ?? $item['icon'] ?? null"
            :icon-right="$item['icon-right'] ?? null"
            :theme="$theme"
        />
    @empty
        {{ $slot }}
    @endforelse
</ul>
