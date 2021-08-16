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
            :href="$item['href'] ?? false"
            :target="$item['target'] ?? false"
            :click="$item['click'] ?? false"
            :iconLeft="$item['iconLeft'] ?? false"
            :iconRight="$item['iconRight'] ?? false"
            :theme="$theme"
        />
    @empty
        {{ $slot }}
    @endforelse
</ul>
