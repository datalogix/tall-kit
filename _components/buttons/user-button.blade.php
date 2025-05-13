<x-tallkit-button
    color="none"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    @if ($userAvatar || $avatarSearch || isset($avatar))
        <x-slot name="iconContent">
            <span {{ $attrs('icon') }}>
                @isset ($avatar)
                    {{ $avatar }}
                @else
                    <x-tallkit-avatar
                        :src="$userAvatar"
                        :search="$avatarSearch"
                        :provider="$avatarProvider"
                        :fallback="$avatarFallback"
                        :icon="$avatarIcon"
                        :attributes="$attrs('avatar')"
                        :props="$props('avatar')"
                        :theme="$theme"
                    >
                        {{ $avatarContent ?? '' }}
                    </x-tallkit-avatar>
                @endisset
            </span>
        </x-slot>
    @endif

    {!! $slot->isEmpty() ? $userName : $slot !!}
</x-tallkit-button>
