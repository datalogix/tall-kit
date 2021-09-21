<x-image-loader
    {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
    :url="$url"
    :icon="$icon"
    :loadingIcon="$loadingIcon"
    :errorIcon="$errorIcon"
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
</x-image-loader>
