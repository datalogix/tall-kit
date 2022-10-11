<nav {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)
        ->merge($breakpointStyles->get('container', []))
}}>
    {{ $prepend ?? '' }}

    <x-logo
        {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'logo')
                ->merge($breakpointStyles->get('logo', []))
        }}
        :image="$logoImage"
        :name="$logoName"
        :url="$logoUrl"
        :route="$logoRoute"
        :theme="$theme"
    >
        {{ $logo ?? '' }}
    </x-logo>

    <x-button
        {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'toggler')
                ->merge($breakpointStyles->get('toggler', []))
        }}
        preset="toggler"
        :theme="$theme"
    >
        {{ $toggler ?? '' }}
    </x-button>

    <x-nav
        {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'nav')
                ->merge($breakpointStyles->get('nav', []))
                ->merge($animated ?
                    $attributes
                        ->mergeOnlyThemeProvider($themeProvider, 'animated')
                        ->merge($breakpointStyles->get('animated', []))
                        ->getAttributes()
                : [])
        }}
        :items="$items"
        :inline="$inline"
        :theme="$theme"
    >
        @isset ($navPrepend)
            <x-slot name="prepend">
                {{ $navPrepend }}
            </x-slot>
        @endisset

        @isset ($navAppend)
            <x-slot name="append">
                {{ $navAppend }}
            </x-slot>
        @endisset

        {{ $slot }}
    </x-nav>

    {{ $append ?? '' }}
</nav>
