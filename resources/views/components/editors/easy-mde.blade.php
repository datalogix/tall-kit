<x-textarea
    :name="$name"
    :id="$id"
    :label="$label"
    :bind="$bind"
    :default="$slot->isEmpty() ? $default : $slot"
    :language="$language"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->merge(toArray($themeProvider->easymde)) }}
/>
