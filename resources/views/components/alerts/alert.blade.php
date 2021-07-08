<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeThemeProvider($themeProvider, 'modes', $mode)
        ->mergeThemeProvider($themeProvider, 'rounded', $rounded)
        ->mergeThemeProvider($themeProvider, 'shadow', $shadow)
        ->merge(['class' => ($mode !== 'outlined' ? 'bg-'.$color.'-200 ' : '').'border-'.$color.'-300'])
        ->merge(['x-init' => 'setup(\''.$on.'\', '.$timeout.')'])
    }}
>
    @if ($icon)
        <span {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'icon')
                ->merge(['class' => 'bg-'.$color.'-100 border-'.$color.'-500 text-'.$color.'-500'])
        }}>
            <x-icon :name="$iconName">
                {!! $iconSvg !!}
            </x-icon>
        </span>
    @endif

    @if ($dismissible)
        <button {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'dismissible', 'container') }}>
            @if ($dismissibleIcon)
                <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'dismissible', 'icon') }}>
                    <x-icon :name="$dismissibleIconName">
                        {!! $dismissibleIconSvg !!}
                    </x-icon>
                </span>
            @endif

            @if ($dismissibleText)
                <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'dismissible', 'text') }}>
                    {!! __($dismissibleText) !!}
                </span>
            @endif
        </button>
    @endif

    <div>
        @if ($title)
            <div {{
                $attributes
                    ->mergeOnlyThemeProvider($themeProvider, 'title')
                    ->merge(['class' => 'text-'.$color.'-800'])
            }}>
                {!! __($title) !!}
            </div>
        @endif

        <div {{
                $attributes
                    ->mergeOnlyThemeProvider($themeProvider, 'message')
                    ->merge(['class' => 'text-'.$color.'-600'])
        }}>
            {!! $slot->isEmpty() ? __($message) : $slot !!}
        </div>
    </div>
</div>
