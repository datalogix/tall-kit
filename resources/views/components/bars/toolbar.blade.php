<header {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    {{ $left ?? '' }}

    <h1 {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'title') }}>
        {!! $slot->isEmpty() ? __($title) : $slot !!}
    </h1>

    {{ $right ?? '' }}
</header>
