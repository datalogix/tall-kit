<x-tallkit-image-loader
    :url="$url"
    :icon="$icon"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    {{ $slot }}

    @isset ($loading)
        <x-slot name="loading">
            {{ $loading }}
        </x-slot>
    @endisset

    @isset ($error)
        <x-slot name="error">
            {{ $error }}
        </x-slot>
    @endisset
</x-tallkit-image-loader>
