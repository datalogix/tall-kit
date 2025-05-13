<x-tallkit-toggleable
    :name="$name"
    :show="$show"
    :overlay="$overlay"
    :closeable="$closeable"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    @isset ($trigger)
        {{ $trigger }}
    @else
        <div {{ $attrs('trigger') }}>
            {!! __('Clique to open (Provide your trigger)') !!}
        </div>
    @endisset

    <div {{ $attrs('dropdown') }}>
        {{ $slot }}
    </div>
</x-tallkit-toggleable>
