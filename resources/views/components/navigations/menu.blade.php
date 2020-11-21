<ul {{
    $attributes
        ->merge($themeProvider->container->toArray())
        ->merge($inline ? $themeProvider->inline->toArray() : [])
}}>
    @forelse($items as $item)
        <x-menu-item
            :text="$item['text'] ?? $item"
            :href="$item['href'] ?? false"
            :iconLeft="$item['iconLeft'] ?? false"
            :iconRight="$item['iconRight'] ?? false"
        />
    @empty
        {{ $slot }}
    @endforelse
</ul>
