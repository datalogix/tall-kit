<ul {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'aligns', $inline ? 'inline' : 'outline')
}}>
    @forelse ($items as $item)
        <li {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'li') }}>
            <x-dynamic-component {{
                    $attributes->mergeOnlyThemeProvider($themeProvider, 'item')
                        ->merge(['class' => data_get($item, 'class')])
                        ->merge(['style' => data_get($item, 'style')])
                        ->merge(data_get($item, 'attrs', []))
                        ->merge(data_get($item, 'attributes', []))
                }}
                :component="data_get($item, 'component', 'button')"
                :text="data_get($item, 'name', data_get($item, 'title', data_get($item, 'text')))"
                :active="data_get($item, 'active')"
                :href="data_get($item, 'component', 'button') === 'button' ? data_get($item, 'href', data_get($item, 'action', data_get($item, 'route'))) : null"
                :action="data_get($item, 'component', 'button') === 'form-button' ? data_get($item, 'href', data_get($item, 'action', data_get($item, 'route'))) : null"
                :target="data_get($item, 'target')"
                :click="data_get($item, 'click')"
                :wire-click="data_get($item, 'wire-click')"
                :icon="data_get($item, 'icon')"
                :icon-left="data_get($item, 'icon-left')"
                :icon-right="data_get($item, 'icon-right')"
                :color="data_get($item, 'color')"
                :rounded="data_get($item, 'rounded')"
                :shadow="data_get($item, 'shadow')"
                :outlined="data_get($item, 'outlined')"
                :link-text="data_get($item, 'link-text')"
                :bordered="data_get($item, 'bordered')"
                :loading="data_get($item, 'loading', true)"
                :preset="data_get($item, 'preset', 'none')"
                :tooltip="data_get($item, 'tooltip')"
                :theme="$theme"
            />
        </li>
    @empty
        {{ $slot }}
    @endforelse
</ul>
