<x-tallkit-field :attributes="$attr()">
    <x-tallkit-input :attributes="$attr('input')->attr('defaul', $slot->isEmpty() ? $default : $slot)" />

    <div {{ $attr('pickr') }}></div>
</x-tallkit-field>
