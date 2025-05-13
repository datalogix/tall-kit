<x-tallkit-html :attributes="$attr('html')">
    @isset ($head)
        <x-slot name="head">
            {{ $head }}
        </x-slot>
    @endisset

    <div {{ $attr() }}>
        <div {{ $attr('header') }}>
            <x-tallkit-logo :attributes="$attr('logo')">
                {{ $logo ?? '' }}
            </x-tallkit-logo>
        </div>

        <x-tallkit-card :attributes="$attr('card')">
            <x-tallkit-messages :attributes="$attr('messages')" />

            {{ $slot }}
        </x-tallkit-card>

        {{ $footer ?? '' }}
    </div>
</x-tallkit-html>
