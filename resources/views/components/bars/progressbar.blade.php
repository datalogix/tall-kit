<div {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$value.','.$min.','.$max.')'])
}}>
    <div {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'bar')
            ->mergeOnlyThemeProvider($themeProvider, 'roundeds', $rounded)
            ->mergeOnlyThemeProvider($themeProvider, 'sizes', $size)
    }}>
        <div {{
            $attributes
                ->mergeThemeProvider($themeProvider, 'progress')
                ->mergeOnlyThemeProvider($themeProvider, 'colors', $color)
                ->mergeOnlyThemeProvider($themeProvider, 'durations', $duration)
                ->mergeOnlyThemeProvider($themeProvider, 'sizes', $size)
                ->mergeOnlyThemeProvider($themeProvider, 'roundeds', $rounded)
                ->merge($displayValue && $size !== 'sm' ? ['x-text' => '`${value}%`'] : [])
        }}></div>
    </div>

    {{ $slot }}
</div>
