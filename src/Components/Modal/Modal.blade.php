<div {{ $attr() }}>
    <div {{ $attr('box') }}>
        @if ($overlay)
            <x-tallkit-overlay :attributes="$attr('overlay')" />
        @endif

        <div {{ $attr('modal') }}>
            {{ $slot }}
        </div>
    </div>

    @isset ($trigger)
        <div {{ $attr('trigger') }}>
            {{ $trigger }}
        </div>
    @endisset
</div>
