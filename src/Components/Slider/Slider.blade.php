<div {{ $attr() }}>
    <div {{ $attr('slider') }}>
        {{ $slot }}
    </div>

    @if (target_get($options, 'controls'))
        @isset ($controls)
            {{ $controls }}
        @else
            <div {{ $attr('prev-container') }}>
                <x-tallkit-button :attributes="$attr('prev')" />
            </div>

            <div {{ $attr('next-container') }}>
                <x-tallkit-button :attributes="$attr('next')" />
            </div>
        @endisset
    @endif

    @if (target_get($options, 'paginator'))
        @isset ($paginator)
            {{ $paginator }}
        @else
            <div {{ $attr('paginator') }}>
                <template x-for="(slide, index) in slides" :key="index">
                    <x-tallkit-button :attributes="$attr('page')" />
                </template>
            </div>
        @endisset
    @endif

    @if (target_get($options, 'progressbar'))
        @isset ($progressbar)
            {{ $progressbar }}
        @else
            <div {{ $attr('progressbar') }}></div>
        @endisset
    @endif
</div>
