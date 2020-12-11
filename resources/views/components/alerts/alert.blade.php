<div {{ $attributes->merge(toArray($attrs['container']), false) }}>
    @if($icon)
        <span {{ $attrs['icon'] }}>
            @if($iconSvg)
                {!! $iconSvg !!}
            @elseif($iconName)
                <x-icon :name="$iconName" />
            @endif
        </span>
    @endif

    @if($dismissible)
        <button {{ $attrs['dismissible'] }}>
            @if($dismissibleIcon)
                <span {{ $attrs['dismissibleIcon'] }}>
                    @if($dismissibleIconSvg)
                        {!! $dismissibleIconSvg !!}
                    @elseif($dismissibleIconName)
                        <x-icon :name="$dismissibleIconName" />
                    @endif
                </span>
            @endif

            @if($dismissibleText)
                <span {{ $attrs['dismissibleText'] }}>{{ __($dismissibleText) }}</span>
            @endif
        </button>
    @endif

    <div>
        @if($title)
            <div {{ $attrs['title'] }}>
                {{ __($title) }}
            </div>
        @endif

        <div {{ $attrs['message'] }}>
            {{ $slot->isEmpty() ? __($message) : $slot }}
        </div>
    </div>
</div>
