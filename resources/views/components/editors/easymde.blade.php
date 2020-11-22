<x-textarea
    x-data="{
        initEasyMDE: function (element) {
            new EasyMDE({ element: element {{ $jsonOptions() }} });
        }
    }"
    x-init="initEasyMDE($el)"
    :name="$name"
    :id="$id"
    :label="$label"
    :bind="$bind"
    :default="$slot->isEmpty() ? $default : $slot"
    :language="$language"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->merge($themeProvider->easymde->toArray()) }}
/>
