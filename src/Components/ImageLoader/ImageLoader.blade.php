
<div {{ $attr() }}>
    @if ($url)
        <img {{ $attr('image') }} />
    @endif

    <x-tallkit-loading :attributes="$attr('loading')" />

    @if ($icon)
        <x-tallkit-icon :attributes="$attr('icon')" />
    @else
        @isset ($loading)
            <div {{ $attr('loading') }}>
                {{ $loading }}
            </div>
        @else
            <x-tallkit-loading :attributes="$attr('loading')" />
        @endisset

        @isset ($error)
            <div {{ $attr('error') }}>
                {{ $error }}
            </div>
        @else
            <x-tallkit-error :attributes="$attr('error')" />
        @endisset
    @endisset
</div>
