<nav {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)
        ->merge($breakpointStyles->get('container', []))
}}>
    <x-logo
        {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'logo')
                ->merge($breakpointStyles->get('logo', []))
        }}
        :image="$logoImage"
        :name="$logoName"
        :url="$logoUrl"
        :theme="$theme"
    >
        {{ $logo ?? '' }}
    </x-logo>

    <x-toggler
        {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'toggler')
                ->merge($breakpointStyles->get('toggler', []))
        }}
        :theme="$theme"
    >
        {{ $toggler ?? '' }}
    </x-toggler>

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
        {{ $slot }}
    </x-nav>
</nav>
