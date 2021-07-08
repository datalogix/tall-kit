<x-button
    {{ $attributes }}
    type="submit"
    :text="$text"
    :color="$color"
    :icon="$icon"
    :iconLeft="$iconLeft"
    :iconRight="$iconRight"
    :outlined="$outlined"
    :bordered="$bordered"
    :rounded="$rounded"
    :shadow="$shadow"
    :theme="$theme"
>{{ $slot }}</x-button>
