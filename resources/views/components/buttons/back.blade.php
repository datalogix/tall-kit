<x-button
    {{ $attributes }}
    :text="$text"
    :href="$href ?? url()->previous()"
    :icon="$icon"
    :iconLeft="$iconLeft"
    :iconRight="$iconRight"
    :color="$color"
    :rounded="$rounded"
    :shadow="$shadow"
    :outlined="$outlined"
    :bordered="$bordered"
    :preset="$preset ?? 'back'"
    :theme="$theme"
>{{ $slot }}</x-button>
