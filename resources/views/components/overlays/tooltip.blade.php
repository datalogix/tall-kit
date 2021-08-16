<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions($value ?? e($content ?? __('Content of tooltip'))).')'])
    }}
>
    {{ $slot }}
</div>
