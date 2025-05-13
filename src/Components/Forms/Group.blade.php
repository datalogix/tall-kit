<x-tallkit-field :attributes="$attr()">
    @isset ($header)
        {{ $header }}
    @else
        <x-tallkit-label :attributes="$attr('label')">
            {{ $labelContent ?? '' }}
        </x-tallkit-label>
    @endisset

    <{{ $fieldset ? 'fieldset' : 'div' }} {{ $attr($fieldset ? 'fieldset' : 'div') }}>
        {{ $slot }}
    </{{ $fieldset ? 'fieldset' : 'div' }}>
</x-field>
