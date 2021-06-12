<x-input
    :name="$name"
    :id="$id"
    :label="$label"
    :type="'text'"
    :bind="$bind"
    :default="$slot->isEmpty() ? $default : $slot"
    :language="$language"
    :showErrors="$showErrors"
    :theme="$theme"
    :placeholder="$placeholder ?? $format"
    x-init="init({{ $jsonOptions() }})"
    {{ $attributes->mergeThemeProvider($themeProvider, 'flatpickr') }}
/>
