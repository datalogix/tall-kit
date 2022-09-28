<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'types', $type)
    }}
>
    {!! $slot->isEmpty() ? __($text) : $slot !!}
</div>
