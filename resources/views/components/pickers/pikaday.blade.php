<x-input
    x-data
    x-init="new Pikaday({ field: $el {{ $jsonOptions() }} })"
    :name="$name"
    :id="$id"
    :label="$label"
    :type="'text'"
    :bind="$bind"
    :default="$slot->isEmpty() ? $default : $slot"
    :language="$language"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->merge($themeProvider->pikaday->toArray())->merge(['placeholder' => $placeholder]) }}
/>
