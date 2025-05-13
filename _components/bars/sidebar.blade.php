<x-tallkit-drawer
    :attributes="$attrs('drawer', false)->merge($themeProvider->breakpoints->get($breakpoint, []), false)"
    :name="$name"
    :show="$show"
    :overlay="$overlay"
    :closeable="$closeable"
    :align="$align"
    :theme="$theme"
    :theme:container="$container()"
>
    <nav {{ $attrs('nav') }}>
        {{ $header ?? '' }}

        <x-tallkit-nav
            :attributes="$attrs('ul')"
            :items="$items"
            :inline="false"
            :theme="$theme"
            :theme:item="$item()"
        >
            @isset ($prepend)
                <x-slot name="prepend">
                    {{ $prepend }}
                </x-slot>
            @endisset

            @isset ($append)
                <x-slot name="append">
                    {{ $append }}
                </x-slot>
            @endisset

            {{ $slot }}
        </x-tallkit-nav>

        {{ $footer ?? '' }}
    </nav>
</x-tallkit-drawer>

@isset ($trigger)
    <div {{ $attrs('trigger')->merge(['@click' => '$dispatch(\''.$name.'-toggle\')']) }}>
        {{ $trigger }}
    </div>
@endisset
