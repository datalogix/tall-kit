<x-tallkit-toggleable :attributes="$attr()">
    @isset ($trigger)
        {{ $trigger }}
    @else
        <div {{ $attr('trigger') }}>
            {!! __('Clique to open (Provide your trigger)') !!}
        </div>
    @endisset

    <div {{ $attr('dropdown') }}>
        {{ $slot }}
    </div>
</x-tallkit-toggleable>
