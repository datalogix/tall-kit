<x-form
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :init="$init"
    :method="$method"
    :action="$action"
    :enctype="$enctype"
    :confirm="$confirm"
    :theme="$theme"
>
    <x-submit
        {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}
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
        :tooltip="$tooltip"
        :theme="$theme"
    >
        {{ $slot }}
    </x-submit>
</x-form>
