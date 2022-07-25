<x-form-button
    {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}
    :init="$init"
    :method="$method"
    :action="$action"
    :enctype="$enctype"
    :confirm="$confirm"
    :text="$text"
    :active="$active"
    :click="$click"
    :wire-click="$wireClick"
    :icon="$icon"
    :icon-left="$iconLeft"
    :icon-right="$iconRight"
    :color="$color"
    :rounded="$rounded"
    :shadow="$shadow"
    :outlined="$outlined"
    :link-text="$linkText"
    :bordered="$bordered"
    :loading="$loading"
    :preset="$preset"
    :tooltip="$tooltip"
    :theme="$theme"
>
    {{ $slot }}
</x-form-button>
