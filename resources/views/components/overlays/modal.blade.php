<div {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$show.')'])
        ->merge($events())
    }}
>
    <div {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'box')
            ->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)
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
                ->mergeOnlyThemeProvider($themeProvider, 'transitions', $transition)
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
