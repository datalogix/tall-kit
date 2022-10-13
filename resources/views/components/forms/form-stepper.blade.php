<x-form {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, $mode, 'container')
    }}
    :init="$init"
    :method="$method"
    :target="$target"
    :action="$action"
    :route="$route"
    :bind="$bind"
    :modelable="$modelable"
    :enctype="$enctype"
    :confirm="$confirm"
    :fields="$fields"
    :theme="$theme"
>
    @if ($title)
        <header {{
            $attributes
                ->mergeThemeProvider($themeProvider, 'header')
                ->mergeOnlyThemeProvider($themeProvider, $mode, 'header')
            }}
        >
            {!! __($title) !!}
        </header>
    @endif

    <x-form-steps {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'steps')
            ->mergeOnlyThemeProvider($themeProvider, $mode, 'steps')
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

                <x-slot name="footer">
                    @isset ($actions)
                        {{ $actions }}
                    @else
                        <div {{
                            $attributes
                                ->mergeOnlyThemeProvider($themeProvider, 'actions')
                                ->mergeOnlyThemeProvider($themeProvider, $mode, 'actions')
                                ->mergeOnlyThemeProvider($themeProvider, $isWired() ? 'wire' : null, 'actions')
                        }}>
                            @if ($prev)
                                <x-button {{
                                    $attributes
                                        ->mergeOnlyThemeProvider($themeProvider, 'prev')
                                        ->mergeOnlyThemeProvider($themeProvider, $mode, 'prev')
                                        ->mergeOnlyThemeProvider($themeProvider, $isWired() ? 'wire' : null, 'prev')
                                        ->merge($current > 1 ? [] : ['style' => 'display:none;'])
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
                                        ->mergeOnlyThemeProvider($themeProvider, $isWired() ? 'wire' : null, 'next')
                                    }}
                                    preset="next"
                                    :theme="$theme"
                                />
                            @endif
                        </div>

                        @if ($loading && $isWired())
                            <div {{
                                $attributes
                                    ->mergeOnlyThemeProvider($themeProvider, 'loading')
                                    ->mergeOnlyThemeProvider($themeProvider, $mode, 'loading')
                                    ->mergeOnlyThemeProvider($themeProvider, $isWired() ? 'wire' : null, 'loading')
                                }}
                            >
                                <x-loading />
                            </div>
                        @endif
                    @endisset
                </x-slot>
            </x-card>
        </x-slot>
    </x-form-steps>
</x-form>

{{ $endFormDataBinder() }}
