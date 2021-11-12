<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
    }}
>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'slider') }}>
        {{ $slot }}
    </div>

    @if ($options['controls'] ?? null)
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
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'prevIcon') }}
                    :name="$prevIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'prevIconName')->first()"
                >
                    {!! $prev ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'prevIconSvg')->first() !!}
                </x-icon>
            </x-button>

            <x-button
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'next') }}
                color="none"
                shadow="none"
                :theme="$theme"
            >
                <x-icon
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'nextIcon') }}
                    :name="$nextIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'nextIconName')->first()"
                >
                    {!! $next ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'nextIconSvg')->first() !!}
                </x-icon>
            </x-button>
        @endisset
    @endif

    @if ($options['paginator'] ?? null)
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

    @if (($options['autoplay'] ?? null) && ($options['progressbar'] ?? null))
        @isset($progressbar)
            {{ $progressbar }}
        @else
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'progressbar') }} />
        @endisset
    @endif
</div>
