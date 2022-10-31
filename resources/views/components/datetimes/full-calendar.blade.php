<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
}}></div>
