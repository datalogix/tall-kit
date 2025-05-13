<x-tallkit-fetchable :attributes="$attr('fetchable')">
    @isset ($header)
        <x-slot name="header">
            {{ $header }}
        </x-slot>
    @endisset

    @isset ($empty)
        <x-slot name="empty">
            {{ $empty }}
        </x-slot>
    @endisset

    @isset ($loading)
        <x-slot name="loading">
            {{ $loading }}
        </x-slot>
    @endisset

    <div {{ $attr() }}>
        @if ($canvas)
            <canvas {{ $attr('canvas') }}></canvas>
        @endif
    </div>

    @isset ($error)
        <x-slot name="error">
            {{ $error }}
        </x-slot>
    @endisset

    @isset ($footer)
        <x-slot name="footer">
            {{ $footer }}
        </x-slot>
    @endisset
</x-tallkit-fetchable>
