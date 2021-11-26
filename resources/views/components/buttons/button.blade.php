<{{ $href ? 'a' : 'button' }} {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'rounded', $rounded)
        ->mergeOnlyThemeProvider($themeProvider, 'shadow', $shadow)
        ->mergeOnlyThemeProvider($themeProvider, $loading && $type === 'submit' ? 'loading' : null, $loading ? 'container' : null)
        ->merge($colorName ? [
            'class' => $outlined
                ? 'bg-transparent hover:bg-'.$colorName.'-'.$colorWeight.' text-'.$colorName.'-'.$colorHover.' hover:text-white border border-'.$colorName.'-'.$colorWeight.' hover:border-transparent'
                : 'bg-'.$colorName.'-'.$colorWeight.' hover:bg-'.$colorName.'-'.$colorHover.' text-white',
        ] : [])
        ->merge($bordered && $colorName ? [
            'class' => 'border border-'.$colorName.'-'.$colorHover,
        ] : [])
    }}
    @if ($href) href="{{ $href }}" @endif
    @if (!$href) type="{{ $type }}" @endif
>
    @if ($loading && $type === 'submit')<span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading', 'content') }}>@endif
        <x-icon
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'iconLeft') }}
            :name="$iconLeft"
        >
            {!! $iconLeft ?? $icon !!}
        </x-icon>

        @if ($slot->isNotEmpty() || $text)
            <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'text') }}>
                {!! $slot->isEmpty() ? __($text) : $slot !!}
            </span>
        @endif

        <x-icon
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'icon-right') }}
            :name="$iconRight"
        >
            {!! $iconRight !!}
        </x-icon>
    @if ($loading && $type === 'submit')</span>@endif

    @if ($loading && $type === 'submit')
        <x-loading
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading', 'loading') }}
            :text="is_string($loading) ? $loading : null"
        />
    @endif
</{{ $href ? 'a' : 'button' }}>
