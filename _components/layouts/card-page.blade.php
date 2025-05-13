<x-tallkit-html
    :attributes="$attrs('html')"
    :props="$props('html')"
    :theme="$theme"
>
    @isset ($head)
        <x-slot name="head">
            {{ $head }}
        </x-slot>
    @endisset

    <div {{ $attrs() }}>
        <div {{ $attrs('header') }}>
            <x-tallkit-logo
                :attributes="$attrs('logo')"
                :props="$props('logo')"
                :theme="$theme"
            >
                {{ $logo ?? '' }}
            </x-tallkit-logo>
        </div>

        <x-tallkit-card
            :attributes="$attrs('card')"
            :props="$props('card')"
            :theme="$theme"
        >
            <x-tallkit-messages
                :attributes="$attrs('messages')"
                :props="$props('messages')"
                :theme="$theme"
            />

            {{ $slot }}
        </x-tallkit-card>

        {{ $footer ?? '' }}
    </div>
</x-tallkit-html>
