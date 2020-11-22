<x-input
    x-data="{
        initPikaday: function (element) {
            new Pikaday({ field: element {{ $jsonOptions() }} });
        }
    }"
    x-init="initPikaday($el)"
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
