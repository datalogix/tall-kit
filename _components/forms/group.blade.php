<x-tallkit-field
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    @isset ($header)
        {{ $header }}
    @else
        <x-tallkit-label
            :label="$label"
            :attributes="$attrs('label-text')"
            :props="$props('label-text')"
            :theme="$theme"
        >
            {{ $labelContent ?? '' }}
        </x-tallkit-label>
    @endisset

    <{{ $fieldset ? 'fieldset' : 'div' }} {{ $attrs($fieldset ? 'fieldset' : 'div') }}>
        {{ $slot }}
    </{{ $fieldset ? 'fieldset' : 'div' }}>
</x-field>
