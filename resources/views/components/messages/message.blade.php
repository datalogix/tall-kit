@if (empty($session) || session()->has($session))
    <div {{
        $attributes
            ->mergeThemeProvider($themeProvider, 'container')
            ->mergeOnlyThemeProvider($themeProvider, 'modes', $mode)
            ->mergeOnlyThemeProvider($themeProvider, 'roundeds', $rounded)
            ->mergeOnlyThemeProvider($themeProvider, 'shadows', $shadow)
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
            <x-button
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'dismissible', 'button') }}
                color="none"
                shadow="none"
                :icon-left="$dismissibleIcon ? $dismissibleIconName : null"
                :text="$dismissibleText"
                :tooltip="$dismissibleTooltip"
                :theme="$theme"
            >
                @if ($dismissibleIcon)
                    <x-slot name="iconLeft">
                        {!! $dismissibleIconSvg !!}
                    </x-slot>
                @endif
            </x-button>
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
@endif
