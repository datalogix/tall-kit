<x-form
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :init="$init"
    :method="$method"
    :target="$target"
    :action="$action"
    :route="$route"
    :bind="$bind"
    :modelable="$modelable"
    :enctype="$enctype"
    :confirm="$confirm"
    :fields="$fields"
    :theme="$theme"
>
    <x-submit
        {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}
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
    </x-submit>
</x-form>

{{ $endFormDataBinder() }}
