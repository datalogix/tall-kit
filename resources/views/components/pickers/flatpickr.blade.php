<x-input
    x-data="{
        initFlatpickr: function (element) {
            flatpickr(element, {{ $jsonOptions() }});
        }
    }"
    x-init="initFlatpickr($el)"
    :name="$name"
    :id="$id"
    :label="$label"
    :type="'text'"
    :bind="$bind"
    :default="$slot->isEmpty() ? $default : $slot"
    :language="$language"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->merge($themeProvider->flatpickr->toArray()) }}
/>
