<li {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, $active ? 'active' : ($completed ? 'completed' : 'uncompleted'))
        ->mergeOnlyThemeProvider($themeProvider, $mode, 'container')
        ->mergeOnlyThemeProvider($themeProvider, $mode, $active ? 'active' : ($completed ? 'completed' : 'uncompleted'))
    }}
>
    <div {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'step')
            ->mergeOnlyThemeProvider($themeProvider, $mode, 'step')
        }}
    >
        <span {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'pointer')
                ->mergeOnlyThemeProvider($themeProvider, $mode, 'pointer')
                ->mergeOnlyThemeProvider($themeProvider, 'pointer-status', $active ? 'active' : ($completed ? 'completed' : 'uncompleted'))
            }}
        >
            @if ($icon)
                <x-icon {{
                    $attributes
                        ->mergeOnlyThemeProvider($themeProvider, 'icon')
                        ->mergeOnlyThemeProvider($themeProvider, $mode, 'icon')
                    }}
                    :name="$icon"
                >
                    {!! $icon !!}
                </x-icon>
            @else
                {!! $label !!}
            @endif
        </span>

        <div {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'content')
                ->mergeOnlyThemeProvider($themeProvider, $mode, 'content')
                ->mergeOnlyThemeProvider($themeProvider, 'content-status', $active ? 'active' : ($completed ? 'completed' : 'uncompleted'))
            }}
        >
            @if ($title)
                <span {{
                    $attributes
                        ->mergeOnlyThemeProvider($themeProvider, 'title')
                        ->mergeOnlyThemeProvider($themeProvider, $mode, 'title')
                    }}
                >
                    {!! $title !!}
                </span>
            @endif

            @if ($subtitle)
                <span {{
                    $attributes
                        ->mergeOnlyThemeProvider($themeProvider, 'subtitle')
                        ->mergeOnlyThemeProvider($themeProvider, $mode, 'subtitle')
                    }}
                >
                    {!! $subtitle !!}
                </span>
            @endif
        </div>
    </div>

    @if ($active && $mode === 'vertical')
        {{ $slot }}
    @endif
</li>
