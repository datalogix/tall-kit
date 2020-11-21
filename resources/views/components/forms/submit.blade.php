<x-button
    type="submit"
    :color="$color"
    :outlined="$outlined"
    :bordered="$bordered"
    :rounded="$rounded"
    :shadow="$shadow"
    :theme="$theme"
    {{ $attributes }}
>
    {{ $slot->isEmpty() ? __('Submit') : $slot }}
</x-button>
