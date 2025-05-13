@if (empty($session) || session()->has($session))
    <div {{
        $attrs('container', false, ['modes' => $mode, 'roundeds' => $rounded, 'shadows' => $shadow])
            ->merge(['class' => ($mode !== 'outlined' ? 'bg-'.$color.'-200 ' : '').'border-'.$color.'-300'])
            ->merge(['x-init' => 'setup(\''.$on.'\', '.$timeout.')'])
        }}
    >
        @if ($icon)
            @isset($iconArea)
                {{ $iconArea }}
            @else
                <span {{ $attrs('icon-area')->merge(['class' => 'bg-'.$color.'-100 border-'.$color.'-500 text-'.$color.'-500']) }}>
                    <x-tallkit-icon
                        :attributes="$attrs('icon')"
                        :name="$iconName"
                        :theme="$theme"
                    >
                        {!! $iconSvg !!}
                    </x-tallkit-icon>
                </span>
            @endif
        @endif

        @if ($dismissible)
            @isset($dismissibleButton)
                {{ $dismissibleButton }}
            @else
                <x-tallkit-button
                    preset="none"
                    :attributes="$attrs(null, null, ['dismissible' => 'button'])"
                    :icon-left="$dismissibleIcon ? $dismissibleIconName : null"
                    :text="$dismissibleText"
                    :tooltip="$dismissibleTooltip"
                    :theme="$theme"
                >
                    @if ($dismissibleIcon)
                        <x-slot name="iconContent">
                            {!! $dismissibleIconSvg !!}
                        </x-slot>
                    @endif
                </x-tallkit-button>
            @endif
        @endif

        <div>
            @if ($title)
                <div {{ $attrs('title')->merge(['class' => 'text-'.$color.'-800']) }}>
                    {!! __($title) !!}
                </div>
            @endif

            <div {{ $attrs('message')->merge(['class' => 'text-'.$color.'-600']) }}>
                {!! $slot->isEmpty() ? __($message) : $slot !!}
            </div>
        </div>
    </div>
@endif
