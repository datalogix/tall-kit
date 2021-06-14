<x-field
    :name="$name"
    :label="false"
    :showErrors="$showErrors"
    :theme="$theme"
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
>
    <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
        <x-label
            :label="$label"
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'labelText') }}
        />
    </label>

    <x-input
        type="hidden"
        :id="$id"
        :name="$name"
        :default="$slot->isEmpty() ? $default : $slot"
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'input') }}
    />

    <trix-editor
        input="{{ $id }}"
        {{ $attributes->mergeThemeProvider($themeProvider, 'trix') }}
    ></trix-editor>
</x-field>
