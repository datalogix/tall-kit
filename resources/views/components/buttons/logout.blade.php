<x-form-button
    {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}
    :init="$init"
    :method="$method"
    :action="$action"
    :enctype="$enctype"
    :confirm="$confirm"
    :text="$text"
    :icon="$icon"
    :icon-left="$iconLeft"
    :icon-right="$iconRight"
    :color="$color"
    :rounded="$rounded"
    :shadow="$shadow"
    :outlined="$outlined"
    :bordered="$bordered"
    :loading="$loading"
    :preset="$preset"
    :theme="$theme"
>
    {{ $slot }}
</x-form-button>
