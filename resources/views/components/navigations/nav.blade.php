<ul {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'aligns', $inline ? 'inline' : 'outline')
}}>
    @forelse ($items as $item)
        <x-nav-item {{
                $attributes
                    ->mergeOnlyThemeProvider($themeProvider, 'item')
                    ->merge(data_get($item, 'attrs', []))
                    ->merge(data_get($item, 'attributes', []))
            }}
            :text="data_get($item, 'text', data_get($item, 'title', $item))"
            :active="data_get($item, 'active')"
            :href="data_get($item, 'href')"
            :target="data_get($item, 'target')"
            :click="data_get($item, 'click')"
            :wire-click="data_get($item, 'wire:click')"
            :icon-left="data_get($item, 'icon-left', data_get($item, 'icon'))"
            :icon-right="data_get($item, 'icon-right')"
            :theme="$theme"
        />
    @empty
        {{ $slot }}
    @endforelse
</ul>
