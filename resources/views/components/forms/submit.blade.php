<x-button
    {{ $attributes }}
    type="submit"
    :text="$text"
    :icon="$icon"
    :iconLeft="$iconLeft"
    :iconRight="$iconRight"
    :color="$color"
    :rounded="$rounded"
    :shadow="$shadow"
    :outlined="$outlined"
    :bordered="$bordered"
    :preset="$preset"
    :theme="$theme"
>{{ $slot }}</x-button>
