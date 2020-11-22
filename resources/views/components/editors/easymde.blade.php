<x-textarea
    x-data
    x-init="new EasyMDE({ element: $el {{ $jsonOptions() }} })"
    :name="$name"
    :id="$id"
    :label="$label"
    :bind="$bind"
    :default="$slot"
    :language="$language"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->merge($themeProvider->easymde->toArray()) }}
/>
