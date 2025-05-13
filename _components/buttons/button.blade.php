<{{ $href ? 'a' : 'button' }} {{
    $attrs('container', false, [
        'types' => $href ? 'link' : 'button',
        'roundeds' => $rounded,
        'shadows' => $shadow,
    ])
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
        ->merge($isActive() ? $attrs('active')->getAttributes() : [])
        ->merge($tooltip ? ['data-tippy-content' => __($tooltip)] : [], false)
    }}
    @if ($href) href="{{ $href }}" @endif
    @if (! $href) type="{{ $type }}" @endif
    @if ($href && $target) target="{{ $target }}" @endif
    @if ($click) @click="{{ $click }}" @endif
    @if ($wireClick) wire:click="{{ $wireClick }}" @endif
>
    @if ($loading)<span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading', 'content', false) }}>@endif
        <x-tallkit-icon
            :attributes="$attrs('icon-left')->merge([
                'class' => target_get($iconLeft, 'class'),
                'style' => target_get($iconLeft, 'style')
            ])"
            :name="target_get($iconLeft, 'name', $iconLeft)"
            :theme="$theme"
        >
            @isset ($iconContent)
                {{ $iconContent }}
            @else
                {!! target_get($iconLeft, 'name', $iconLeft) !!}
            @endisset
        </x-tallkit-icon>

        @if ($slot->isNotEmpty() || $text)
            <span {{ $attrs('text') }}>
                {!! $slot->isEmpty() ? __($text) : $slot !!}
            </span>
        @endif

        <x-tallkit-icon
            :attributes="$attrs('icon-right')->merge([
                'class' => target_get($iconRight, 'class'),
                'style' => target_get($iconRight, 'style')
            ])"
            :name="target_get($iconRight, 'name', $iconRight)"
            :theme="$theme"
        >
            {!! target_get($iconRight, 'name', $iconRight) !!}
        </x-tallkit-icon>
    @if ($loading)</span>@endif

    @if ($loading)
        <x-tallkit-loading
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading', 'component', false) }}
            text="{!! is_string($loading) && ($slot->isNotEmpty() || $text) ? $loading : ($slot->isEmpty() ? __($text) : $slot) !!}"
            :theme="$theme"
        />
    @endif
</{{ $href ? 'a' : 'button' }}>
