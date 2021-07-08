
<nav {{ $attributes->mergeThemeProvider($themeProvider, $inline ? 'inline' : 'container')}}>
    {{ $header ?? '' }}

    <x-menu
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'menu')}}
        :class="$inline ? 'flex' : ''"
        :inline="$inline"
        :items="$items"
        :theme="$theme"
        :theme:item="$item()"
        :theme:container.except.class="true"
        :theme:inline.except.class="true"
    />

    {{ $footer ?? '' }}
</nav>
