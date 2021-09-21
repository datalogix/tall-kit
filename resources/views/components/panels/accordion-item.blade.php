<li {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$open.')'])
}}>
    <div {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'trigger')
            ->merge($disabled ? $attributes->mergeOnlyThemeProvider($themeProvider, 'disabled')->getAttributes() : [])
    }}>
        {{ $trigger ?? $name ?? __('Clique to open (Provide your trigger)') }}
    </div>

    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'item') }}>
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'content') }}>
            {{ $slot }}
        </div>
    </div>
</li>
