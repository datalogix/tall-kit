<x-button
    {{ $attributes }}
    type="submit"
    :text="$text"
    :icon="$icon"
    :icon-left="$iconLeft"
    :icon-right="$iconRight"
    :color="$color"
    :rounded="$rounded"
    :shadow="$shadow"
    :outlined="$outlined"
    :bordered="$bordered"
    :loading="$loading ?? true"
    :preset="$preset"
    :theme="$theme"
>{{ $slot }}</x-button>
