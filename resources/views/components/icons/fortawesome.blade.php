<i {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['class' => 'fa-'.$style])
        ->merge(['class' => 'fa-'.Str::replaceFirst('fa-', '', ($slot->isEmpty() ? $name : $slot))])
}}></i>
