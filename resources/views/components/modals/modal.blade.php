<div
    x-init="init({{ $show }})"
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
>
    <div {{
        $attributes->mergeOnlyThemeProvider($themeProvider, 'box')->merge(
            $attributes->mergeOnlyThemeProvider($themeProvider, 'aligns', $align)->getAttributes()
        )
    }}>
        @if($overlay)
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'overlay') }}>
                <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'backdrop') }}></div>
            </div>
        @endif

        <div {{
            $attributes
                ->mergeThemeProvider($themeProvider, 'modal')
                ->mergeThemeProvider($themeProvider, 'transitions', $align)
        }}>
            {{ $slot }}
        </div>
    </div>

    @if(isset($trigger))
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'trigger') }}>
            {!! $trigger !!}
        </div>
    @endif
</div>
