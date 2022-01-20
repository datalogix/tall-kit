<li {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
    <{{ $href ? 'a' : 'button' }}
        @if ($href) href="{{ $href }}" @endif
        @if ($target) target="{{ $target }}" @endif
        @if ($click) @click="{{ $click }}" @endif
        @if ($wireClick) wire:click="{{ $wireClick }}" @endif
        {{
            $attributes
                ->mergeThemeProvider($themeProvider, 'item')
                ->merge($isActive()
                    ? $attributes->mergeOnlyThemeProvider($themeProvider, 'active')->getAttributes()
                    : []
                )
        }}
    >
        <x-icon
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'icon-left') }}
            :name="$iconLeft"
        >
            {!! $iconLeft !!}
        </x-icon>

        <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'text') }}>
            {!! $slot->isEmpty() ? __($text) : $slot !!}
        </span>

        <x-icon
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'icon-right') }}
            :name="$iconRight"
        >
            {!! $iconRight !!}
        </x-icon>
    </{{ $href ? 'a' : 'button' }}>
</li>
