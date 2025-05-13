<x-tallkit-field :attributes="$attr()">
    @if ($label || isset($labelContent))
        <label {{ $attr('label-container') }}>
            <x-tallkit-label :attributes="$attr('label')">
                {{ $labelContent ?? '' }}
            </x-tallkit-label>
        </label>
    @endif

    <x-tallkit-loading :attributes="$attr('loading')" />

    <x-tallkit-input :attributes="$attr('input')->attr('default', $slot->isEmpty() ? $default : $slot)" />

    <div {{ $attr('editor') }}></div>
</x-tallkit-field>
