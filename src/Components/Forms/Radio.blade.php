<x-tallkit-field :attributes="$attr()">
    <label {{ $attr('label-container') }}>
        <input {{ $attr('radio') }} />

        <x-tallkit-label :attributes="$attr('label')">
            {{ $slot }}
        </x-tallkit-label>
    </label>
</x-tallkit-field>
