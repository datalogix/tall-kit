<button
    type="{{ $type }}"
    {{
        $attributes
            ->mergeThemeProvider($themeProvider, 'container')
            ->mergeThemeProvider($themeProvider, 'rounded', $rounded)
            ->mergeThemeProvider($themeProvider, 'shadow', $shadow)
            ->merge($colorName ? [
                'class' => $outlined
                    ? 'bg-transparent hover:bg-'.$colorName.'-'.$colorWeight.' text-'.$colorName.'-'.$colorHover.' hover:text-white border border-'.$colorName.'-'.$colorWeight.' hover:border-transparent'
                    : 'bg-'.$colorName.'-'.$colorWeight.' hover:bg-'.$colorName.'-'.$colorHover.' text-white',
            ] : [])
            ->merge($bordered && $colorName ? [
                'class' => 'border border-'.$colorName.'-'.$colorHover,
            ] : [])
    }}
>
    {{ $slot->isEmpty() ? __($text) : $slot }}
</button>
