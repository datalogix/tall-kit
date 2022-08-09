<x-fetchable {{
    $attributes
        ->mergeOnlyThemeProvider($themeProvider, 'fetchable')
        ->merge($size())
    }}
    :url="$url"
>
    @isset ($header)
        <x-slot name="header">
            {{ $header }}
        </x-slot>
    @endisset

    @isset ($empty)
        <x-slot name="empty">
            {{ $empty }}
        </x-slot>
    @elseif (! $url)
        <x-slot name="empty">
            <div {{
                $attributes
                    ->mergeThemeProvider($themeProvider, 'container')
                    ->merge(['x-init' => 'setup('.$jsonOptions().')'])
                    ->merge($name ? ['@'.$name.'-update.window' => 'update'] : [])
                    ->merge($size())
            }}>
                @if ($canvas)
                    <canvas {{
                        $attributes
                            ->mergeOnlyThemeProvider($themeProvider, 'canvas')
                            ->merge($size())
                    }}></canvas>
                @endif
            </div>
        </x-slot>
    @endisset

    @isset ($loading)
        <x-slot name="loading">
            {{ $loading }}
        </x-slot>
    @endisset

    <div {{
        $attributes
            ->mergeThemeProvider($themeProvider, 'container')
            ->merge(['x-init' => 'setup({...'.$jsonOptions().', ...(response || {})})'])
            ->merge($name ? ['@'.$name.'-update.window' => 'update'] : [])
            ->merge($size())
    }}>
        @if ($canvas)
            <canvas {{
                $attributes
                    ->mergeOnlyThemeProvider($themeProvider, 'canvas')
                    ->merge($size())
            }}></canvas>
        @endif
    </div>

    @isset ($failed)
        <x-slot name="failed">
            {{ $failed }}
        </x-slot>
    @endisset

    @isset ($footer)
        <x-slot name="footer">
            {{ $footer }}
        </x-slot>
    @endisset
</x-fetchable>
