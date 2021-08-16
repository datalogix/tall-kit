<button {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'rounded', $rounded)
        ->mergeOnlyThemeProvider($themeProvider, 'shadow', $shadow)
        ->merge($colorName ? [
            'class' => $outlined
                ? 'bg-transparent hover:bg-'.$colorName.'-'.$colorWeight.' text-'.$colorName.'-'.$colorHover.' hover:text-white border border-'.$colorName.'-'.$colorWeight.' hover:border-transparent'
                : 'bg-'.$colorName.'-'.$colorWeight.' hover:bg-'.$colorName.'-'.$colorHover.' text-white',
        ] : [])
        ->merge($bordered && $colorName ? [
            'class' => 'border border-'.$colorName.'-'.$colorHover,
        ] : [])
    }}
    type="{{ $type }}"
>
    <x-icon
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'iconLeft') }}
        :name="$iconLeft"
    >
        {!! $iconLeft !!}
    </x-icon>

    @if ($slot->isNotEmpty() || $text)
        <span>{!! $slot->isEmpty() ? __($text) : $slot !!}</span>
    @endif

    <x-icon
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'iconRight') }}
        :name="$iconRight"
    >
        {!! $iconRight !!}
    </x-icon>
</button>
