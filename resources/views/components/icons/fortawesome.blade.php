<i {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['class' => 'fa-'.$iconStyle])
        ->merge(['class' => 'fa-'.($slot->isEmpty() ? $icon : $slot)])
}}></i>
