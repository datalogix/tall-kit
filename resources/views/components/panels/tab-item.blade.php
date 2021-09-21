<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge($disabled ? ['disabled' => true] : [])
}}>
    <template data-header>
        {{ $header ?? $name ?? __('Tab name') }}
    </template>

    {{ $slot }}
</div>
