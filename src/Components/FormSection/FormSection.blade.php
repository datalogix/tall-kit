<div {{ $attr() }}>
    <div {{ $attr('section') }}>
        <x-tallkit-section :attributes="$attr('title')">
            {{ $description ?? '' }}
        </x-tallkit-section>
    </div>

    <div {{ $attr('form') }}>
        <x-tallkit-card :attributes="$attr('card')">
            {{ $slot }}

            @isset ($header)
                <x-slot name="header">
                    {{ $header }}
                </x-slot>
            @endisset

            @isset ($top)
                <x-slot name="top">
                    {{ $top }}
                </x-slot>
            @endisset

            @isset ($bottom)
                <x-slot name="bottom">
                    {{ $bottom }}
                </x-slot>
            @endisset

            @isset ($actions)
                <x-slot name="footer">
                    {{ $actions }}
                </x-slot>
            @endisset
        </x-tallkit-card>
    </div>
</div>
