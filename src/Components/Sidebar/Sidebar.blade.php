<x-tallkit-drawer :attributes="$attr()">
    <nav {{ $attr('nav') }}>
        {{ $header ?? '' }}

        <x-tallkit-nav :attributes="$attr('ul')">
            {{ $slot }}

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
        </x-tallkit-nav>

        {{ $footer ?? '' }}
    </nav>
</x-tallkit-drawer>

@isset ($trigger)
    <div {{ $attr('trigger') }}>
        {{ $trigger }}
    </div>
@endisset
