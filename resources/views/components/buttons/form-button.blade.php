<x-form
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :method="$method"
    :action="$action"
    :enctype="$enctype"
    :confirm="$confirm"
    :theme="$theme"
>
    <x-submit
        {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}
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
    </x-submit>
</x-form>
