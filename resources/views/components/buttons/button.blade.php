<{{ $href ? 'a' : 'button' }} {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'types', $href ? 'link' : 'button')
        ->mergeOnlyThemeProvider($themeProvider, 'roundeds', $rounded)
        ->mergeOnlyThemeProvider($themeProvider, 'shadows', $shadow)
        ->mergeOnlyThemeProvider($themeProvider, $loading ? 'loading' : null, $loading ? ($href ? 'link' : 'button') : null)
        ->mergeOnlyThemeProvider($themeProvider, $loading ? 'loading' : null, $loading ? 'container' : null)
        ->merge($outlined && $colorName ? [
            'class' => 'bg-transparent hover:bg-'.$colorName.'-'.$colorWeight.' text-'.$colorName.'-'.$colorHover.' hover:text-white border border-'.$colorName.'-'.$colorWeight.' hover:border-transparent',
        ] : [])
        ->merge($linkText && $colorName ? [
            'class' => 'hover:text-'.$colorName.'-'.$colorHover,
        ] : [])
        ->merge($bordered && $colorName ? [
            'class' => 'border border-'.$colorName.'-'.$colorHover,
        ] : [])
        ->merge(! $outlined && ! $linkText && $colorName ? [
            'class' => 'bg-'.$colorName.'-'.$colorWeight.' hover:bg-'.$colorName.'-'.$colorHover.' text-white',
        ] : [])
        ->merge($isActive() ? $attributes->mergeOnlyThemeProvider($themeProvider, 'active')->getAttributes() : [])
        ->merge($tooltip ? ['data-tippy-content' => __($tooltip)] : [], false)
    }}
    @if ($href) href="{{ $href }}" @endif
    @if (! $href) type="{{ $type }}" @endif
    @if ($href && $target) target="{{ $target }}" @endif
    @if ($click) @click="{{ $click }}" @endif
    @if ($wireClick) wire:click="{{ $wireClick }}" @endif
>
    @if ($loading)<span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading', 'content', false) }}>@endif
        <x-icon {{
                $attributes
                    ->mergeOnlyThemeProvider($themeProvider, 'icon-left')
                    ->merge(['class' => data_get($iconLeft, 'class')])
                    ->merge(['style' => data_get($iconLeft, 'style')])
            }}
            :name="data_get($iconLeft, 'name', $iconLeft)"
        >
            @isset ($icon)
                {{ $icon }}
            @else
                {!! data_get($iconLeft, 'name', $iconLeft) !!}
            @endisset
        </x-icon>

        @if ($slot->isNotEmpty() || $text)
            <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'text') }}>
                {!! $slot->isEmpty() ? __($text) : $slot !!}
            </span>
        @endif

        <x-icon {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'icon-right')
                ->merge(['class' => data_get($iconRight, 'class')])
                ->merge(['style' => data_get($iconRight, 'style')])
            }}
            :name="data_get($iconRight, 'name', $iconRight)"
        >
            {!! data_get($iconRight, 'name', $iconRight) !!}
        </x-icon>
    @if ($loading)</span>@endif

    @if ($loading)
        <x-loading
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading', 'component', false) }}
            text="{!! is_string($loading) && ($slot->isNotEmpty() || $text) ? $loading : ($slot->isEmpty() ? __($text) : $slot) !!}"
        />
    @endif
</{{ $href ? 'a' : 'button' }}>
