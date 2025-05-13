<x-tallkit-card-page
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    @isset ($head)
        <x-slot name="head">
            {{ $head }}
        </x-slot>
    @endisset

    @isset ($logo)
        <x-slot name="logo">
            {{ $logo }}
        </x-slot>
    @endisset

    {{ $slot->isEmpty() ? __('A server error occurred') : $slot }}

    <x-slot name="footer">
        @isset ($footer)
            {{ $footer }}
        @else
            <x-tallkit-back
                :attributes="$attrs('back')"
                :props="$props('back')"
                :theme="$theme"
            />
        @endisset
    </x-slot>
</x-tallkit-card-page>
