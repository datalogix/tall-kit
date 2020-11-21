<div
    x-data="{
        hide: false,
        timeout: function (i) {
            setInterval(() => {
                this.hide = true;
            }, i);
        },
    }"
    @if($timeout) x-init="timeout({{ $timeout }})" @endif
    x-show="!hide"
    {{ $attributes->merge($attrs['container'])->merge(['role' => 'alert']) }}
>
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
        <button
            @click="hide = true"
            type="button"
            {{ $attrs['dismissible'] }}
        >
            @if($dismissibleIcon)
                <span {{ $attrs['dismissibleIcon'] }}>
                    @if($dismissibleIconSvg])
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
