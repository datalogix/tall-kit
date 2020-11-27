<ul {{
    $attributes
        ->merge(toArray($themeProvider->container))
        ->merge($inline ? toArray($themeProvider->inline) : [])
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
