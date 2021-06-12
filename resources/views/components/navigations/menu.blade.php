<ul {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeThemeProvider($themeProvider, $inline ? 'inline' : null)
}}>
    @forelse($items as $item)
        <x-menu-item
            :text="$item['text'] ?? $item"
            :href="$item['href'] ?? false"
            :iconLeft="$item['iconLeft'] ?? false"
            :iconRight="$item['iconRight'] ?? false"
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'item') }}
        />
    @empty
        {{ $slot }}
    @endforelse
</ul>
