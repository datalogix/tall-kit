<li {{ $attr() }}>
    <div {{ $attr('step') }}>
        <span {{ $attr('pointer') }}>
            @if ($icon)
                <x-tallkit-icon :attributes="$attr('icon')" />
            @else
                {!! __($label) !!}
            @endif
        </span>

        <div {{ $attr('content') }}>
            @if ($title)
                <span {{ $attr('title') }}>
                    {!! __($title) !!}
                </span>
            @endif

            @if ($subtitle)
                <span {{ $attr('subtitle') }}>
                    {!! __($subtitle) !!}
                </span>
            @endif
        </div>
    </div>

    @if ($active && $mode === 'vertical')
        {{ $slot }}
    @endif
</li>
