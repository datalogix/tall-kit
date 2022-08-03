<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :theme="$theme"
>
    @if ($label || isset($labelContent))
        <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
            <x-label
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label-text') }}
                :label="$label"
                :theme="$theme"
            >
                {{ $labelContent ?? '' }}
            </x-label>
        </label>
    @endif

    <x-loading {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading') }} />

    <x-input
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'input') }}
        :name="$name"
        :id="$id"
        :type="'hidden'"
        :default="$slot->isEmpty() ? $default : $slot"
        :theme="$theme"
    />

    <trix-editor
        {{ $attributes->mergeThemeProvider($themeProvider, 'editor') }}
        input="{{ $id }}"
    ></trix-editor>
</x-field>
