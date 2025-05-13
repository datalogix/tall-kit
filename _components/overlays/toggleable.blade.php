<div {{ $attrs() }}>
    @if ($overlay)
        <x-tallkit-overlay
            :closeable="$closeable"
            :attributes="$attrs('overlay')"
            :props="$attrs('props')"
            :theme="$theme"
        />
    @endif

    {{ $slot }}
</div>
