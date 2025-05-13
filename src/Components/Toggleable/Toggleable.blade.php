<div {{ $attr() }}>
    @if ($overlay)
        <x-tallkit-overlay :attributes="$attr('overlay')" />
    @endif

    {{ $slot }}
</div>
