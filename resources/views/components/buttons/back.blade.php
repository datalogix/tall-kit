<x-button
    {{ $attributes }}
    :text="$text"
    :href="$href ?? url()->previous()"
    :icon="$icon"
    :icon-left="$iconLeft"
    :icon-right="$iconRight"
    :color="$color"
    :rounded="$rounded"
    :shadow="$shadow"
    :outlined="$outlined"
    :bordered="$bordered"
    :loading="$loading"
    :preset="$preset ?? 'back'"
    :theme="$theme"
>{{ $slot }}</x-button>
