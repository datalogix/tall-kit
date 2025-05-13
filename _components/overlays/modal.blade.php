<div {{ $attrs() }}>
    <div {{ $attrs('box') }}>
        @if ($overlay)
            <x-tallkit-overlay
                :closeable="$closeable"
                :attributes="$attrs('overlay')"
                :props="$props('overlay')"
                :theme="$theme"
            />
        @endif

        <div {{ $attrs('modal') }}>
            {{ $slot }}
        </div>
    </div>

    @isset ($trigger)
        <div {{ $attrs('trigger') }}>
            {{ $trigger }}
        </div>
    @endisset
</div>
