<x-tallkit-image-loader :attributes="$attr()">
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
