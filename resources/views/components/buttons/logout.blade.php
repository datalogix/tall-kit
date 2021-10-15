<x-form-button
    {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}
    :method="$method"
    :action="$action"
    :enctype="$enctype"
    :confirm="$confirm"
    :text="$text"
    :color="$color"
    :icon="$icon"
    :iconLeft="$iconLeft"
    :iconRight="$iconRight"
    :outlined="$outlined"
    :bordered="$bordered"
    :rounded="$rounded"
    :shadow="$shadow"
    :preset="$preset"
    :theme="$theme"
>
    {{ $slot }}
</x-form-button>
