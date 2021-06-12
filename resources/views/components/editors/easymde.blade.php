<x-textarea
    :name="$name"
    :id="$id"
    :label="$label"
    :bind="$bind"
    :default="$slot->isEmpty() ? $default : $slot"
    :language="$language"
    :showErrors="$showErrors"
    :theme="$theme"
    :theme:container="['wire:ignore' => '']"
    x-init="init({{ $jsonOptions() }})"
    {{ $attributes->mergeThemeProvider($themeProvider, 'easymde') }}
/>
