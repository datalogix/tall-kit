<div {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$show.')'])
        ->merge($events())
    }}
>
    <div {{
        $attributes->mergeOnlyThemeProvider($themeProvider, 'box')->merge(
            $attributes->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)->getAttributes()
        )
    }}>
        @if ($overlay)
            <x-overlay
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'overlay') }}
                :theme="$theme"
            />
        @endif

        <div {{
            $attributes
                ->mergeThemeProvider($themeProvider, 'modal')
                ->mergeThemeProvider($themeProvider, 'transitions', $align)
        }}>
            {{ $slot }}
        </div>
    </div>

    @isset ($trigger)
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'trigger') }}>
            {!! $trigger !!}
        </div>
    @endisset
</div>
