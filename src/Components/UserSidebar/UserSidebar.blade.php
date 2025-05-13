@if ($items->isNotEmpty() || $slot->isNotEmpty() || (isset($header) && $header->isNotEmpty()) || (isset($footer) && $footer->isNotEmpty()))
    <x-tallkit-sidebar :attributes="$attr()">
        {{ $slot }}

        <x-slot name="header">
            <x-tallkit-logo :attributes="$attr('logo')">
                {{ $header ?? '' }}
            </x-tallkit-logo>
        </x-slot>

        @isset ($footer)
            <x-slot name="footer">
                {{ $footer }}
            </x-slot>
        @endisset
    </x-tallkit-sidebar>

    @isset ($trigger)
        {{ $trigger }}
    @elseif ($user)
        <x-tallkit-user-button :attributes="$attr('trigger')">
            @isset ($avatar)
                <x-slot name="avatar">
                    {{ $avatar }}
                </x-slot>
            @endisset

            @isset ($avatarContent)
                <x-slot name="avatarContent">
                    {{ $avatarContent }}
                </x-slot>
            @endisset
        </x-tallkit-user-button>
    @endisset
@endif
