<x-tallkit-button :attributes="$attr()">
    @if ($userAvatar || $avatarSearch || isset($avatar))
        <x-slot name="iconContent">
            <span {{ $attr('icon') }}>
                @isset ($avatar)
                    {{ $avatar }}
                @else
                    <x-tallkit-avatar :attributes="$attr('avatar')">
                        {{ $avatarContent ?? '' }}
                    </x-tallkit-avatar>
                @endisset
            </span>
        </x-slot>
    @endif

    {!! $slot->isEmpty() ? $userName : $slot !!}
</x-tallkit-button>
