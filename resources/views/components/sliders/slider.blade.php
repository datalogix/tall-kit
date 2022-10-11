<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
}}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'slider') }}>
        {{ $slot }}
    </div>

    @if (target_get($options, 'controls'))
        @isset($controls)
            {{ $controls }}
        @else
            <div {{
                $attributes
                    ->mergeOnlyThemeProvider($themeProvider, 'prev-container')
                    ->merge($attributes->mergeOnlyThemeProvider($themeProvider, 'actions-container')->getAttributes())
            }}>
                <x-button {{
                    $attributes
                        ->mergeOnlyThemeProvider($themeProvider, 'prev')
                        ->merge($attributes->mergeOnlyThemeProvider($themeProvider, 'actions')->getAttributes())
                    }}
                    preset="none"
                    :tooltip="$prevTooltip"
                    :theme="$theme"
                >
                    <x-icon
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'prev-icon') }}
                        :name="$prevIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'prev-icon-name')->first()"
                    >
                        {!! $prev ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'prev-icon-svg')->first() !!}
                    </x-icon>
                </x-button>
            </div>

            <div {{
                $attributes
                    ->mergeOnlyThemeProvider($themeProvider, 'next-container')
                    ->merge($attributes->mergeOnlyThemeProvider($themeProvider, 'actions-container')->getAttributes())
            }}>
                <x-button {{
                    $attributes
                        ->mergeOnlyThemeProvider($themeProvider, 'next')
                        ->merge($attributes->mergeOnlyThemeProvider($themeProvider, 'actions')->getAttributes())
                    }}
                    preset="none"
                    :tooltip="$nextTooltip"
                    :theme="$theme"
                >
                    <x-icon
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'next-icon') }}
                        :name="$nextIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'next-icon-name')->first()"
                    >
                        {!! $next ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'next-icon-svg')->first() !!}
                    </x-icon>
                </x-button>
            </div>
        @endisset
    @endif

    @if (target_get($options, 'paginator'))
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

    @if (target_get($options, 'progressbar'))
        @isset($progressbar)
            {{ $progressbar }}
        @else
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'progressbar') }}></div>
        @endisset
    @endif
</div>
