<ul {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'aligns', $inline ? 'inline' : 'outline')
}}>
    {{ $prepend ?? '' }}

    @forelse ($items as $item)
        <li {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'li') }}>
            <x-dynamic-component {{
                    $attributes->mergeOnlyThemeProvider($themeProvider, 'item')
                        ->merge(['class' => target_get($item, 'class')])
                        ->merge(['style' => target_get($item, 'style')])
                        ->merge(target_get($item, ['attrs', 'attributes'], []))
                }}
                :component="target_get($item, 'component', 'button')"
                :text="target_get($item, ['name', 'title', 'text'], is_string($item) ? $item : null)"
                :active="target_get($item, 'active')"
                :href="target_get($item, 'component', 'button') === 'button' ? target_get($item, ['href', 'action', 'route']) : null"
                :action="target_get($item, 'component', 'button') === 'form-button' ? target_get($item, ['href', 'action']) : null"
                :route="target_get($item, 'route')"
                :target="target_get($item, 'target')"
                :click="target_get($item, 'click')"
                :wire-click="target_get($item, 'wire-click')"
                :icon="target_get($item, 'icon')"
                :icon-left="target_get($item, 'icon-left')"
                :icon-right="target_get($item, 'icon-right')"
                :color="target_get($item, 'color')"
                :rounded="target_get($item, 'rounded')"
                :shadow="target_get($item, 'shadow')"
                :outlined="target_get($item, 'outlined')"
                :link-text="target_get($item, 'link-text')"
                :bordered="target_get($item, 'bordered')"
                :loading="target_get($item, 'loading', true)"
                :preset="target_get($item, 'preset', 'none')"
                :tooltip="target_get($item, 'tooltip')"
                :theme="$theme"
            />
        </li>
    @empty
        {{ $slot }}
    @endforelse

    {{ $append ?? '' }}
</ul>
