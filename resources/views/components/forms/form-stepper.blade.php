<x-form-steps {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, $mode, 'container')
    }}
    :mode="$mode"
    :steps="$steps"
    :current="$current"
    :theme="$theme"
>
    <x-slot name="content">
        <x-card {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'card')
                ->mergeOnlyThemeProvider($themeProvider, $mode, 'card')
            }}
        >
            @isset ($header)
                <x-slot name="header">
                    {{ $header }}
                </x-slot>
            @endisset

            {{ $slot }}
            {{ $bottom ?? '' }}

            <x-slot name="footer">
                @isset ($actions)
                    {{ $actions }}
                @else
                    @if ($prev && $current > 1)
                        <x-button {{
                            $attributes
                                ->mergeOnlyThemeProvider($themeProvider, 'prev')
                                ->mergeOnlyThemeProvider($themeProvider, $mode, 'prev')
                                ->mergeOnlyThemeProvider($themeProvider, $isWired() ? 'prev-wire' : null)
                            }}
                            preset="prev"
                            :theme="$theme"
                        />
                    @endif

                    @if ($next)
                        <x-submit {{
                            $attributes
                                ->mergeOnlyThemeProvider($themeProvider, 'next')
                                ->mergeOnlyThemeProvider($themeProvider, $mode, 'next')
                                ->mergeOnlyThemeProvider($themeProvider, $isWired() ? 'next-wire' : null)
                            }}
                            preset="next"
                            :theme="$theme"
                        />
                    @endif

                    @if ($loading && $isWired())
                        <x-loading {{
                            $attributes
                                ->mergeOnlyThemeProvider($themeProvider, 'loading')
                                ->mergeOnlyThemeProvider($themeProvider, $mode, 'loading')
                            }}
                        />
                    @endif
                @endisset
            </x-slot>
        </x-card>
    </x-slot>
</x-form-steps>
