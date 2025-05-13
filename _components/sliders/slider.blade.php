<div {{ $attrs() }}>
    <div {{ $attrs('slider') }}>
        {{ $slot }}
    </div>

    @if (target_get($options, 'controls'))
        @isset ($controls)
            {{ $controls }}
        @else
            <div {{ $attrs('prev-container') }}>
                <x-tallkit-button
                    preset="none"
                    :tooltip="$prevTooltip"
                    :attributes="$attrs('prev')"
                    :props="$props('prev')"
                    :theme="$theme"
                >
                    <x-tallkit-icon
                        :name="$prevIcon ?? $attrs('prev-icon-name')->first()"
                        :attributes="$attrs('prev-icon')"
                        :props="$props('prev-icon')"
                        :theme="$theme"
                    >
                        {!! $prev ?? $attrs('prev-icon-svg')->first() !!}
                    </x-tallkit-icon>
                </x-tallkit-button>
            </div>

            <div {{ $attrs('next-container') }}>
                <x-tallkit-button
                    preset="none"
                    :tooltip="$nextTooltip"
                    :attributes="$attrs('next')"
                    :props="$props('next')"
                    :theme="$theme"
                >
                    <x-tallkit-icon
                        :name="$nextIcon ?? $attrs('next-icon-name')->first()"
                        :attributes="$attrs('next-icon')"
                        :props="$props('next-icon')"
                        :theme="$theme"
                    >
                        {!! $next ?? $attrs('next-icon-svg')->first() !!}
                    </x-tallkit-icon>
                </x-tallkit-button>
            </div>
        @endisset
    @endif

    @if (target_get($options, 'paginator'))
        @isset ($paginator)
            {{ $paginator }}
        @else
            <div {{ $attrs('paginator') }}>
                <template x-for="(slide, index) in slides" :key="index">
                    <x-tallkit-button
                        rounded="full"
                        :attributes="$attrs('page')"
                        :props="$props('page')"
                        :theme="$theme"
                    />
                </template>
            </div>
        @endisset
    @endif

    @if (target_get($options, 'progressbar'))
        @isset ($progressbar)
            {{ $progressbar }}
        @else
            <div {{ $attrs('progressbar') }}></div>
        @endisset
    @endif
</div>
