<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'slider') }}>
        {{ $slot }}
    </div>

    @if (data_get($options, 'controls'))
        @isset($controls)
            {{ $controls }}
        @else
            <x-button
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'prev') }}
                color="none"
                shadow="none"
                :theme="$theme"
            >
                <x-icon
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'prev-icon') }}
                    :name="$prevIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'prev-icon-name')->first()"
                >
                    {!! $prev ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'prev-icon-svg')->first() !!}
                </x-icon>
            </x-button>

            <x-button
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'next') }}
                color="none"
                shadow="none"
                :theme="$theme"
            >
                <x-icon
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'next-icon') }}
                    :name="$nextIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'next-icon-name')->first()"
                >
                    {!! $next ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'next-icon-svg')->first() !!}
                </x-icon>
            </x-button>
        @endisset
    @endif

    @if (data_get($options, 'paginator'))
        @isset($paginator)
            {{ $paginator }}
        @else
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'paginator') }}>
                <template x-for="(slide, index) in slides" :key="index">
                    <x-button
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'page') }}
                        rounded="full"
                        :theme="$theme"
                    />
                </template>
            </div>
        @endisset
    @endif

    @if (data_get($options, 'autoplay') && data_get($options, 'progressbar'))
        @isset($progressbar)
            {{ $progressbar }}
        @else
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'progressbar') }} />
        @endisset
    @endif
</div>
