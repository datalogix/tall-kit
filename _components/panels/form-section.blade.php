<div {{ $attrs() }}>
    <div {{ $attrs('section') }}>
        <x-tallkit-section
            :title="$title"
            :subtitle="$subtitle"
            :attributes="$attrs('title')"
            :props="$props('title')"
            :theme="$theme"
        >
            {{ $description ?? '' }}
        </x-tallkit-section>
    </div>

    <div {{ $attrs('form') }}>
        <x-tallkit-card
            :attributes="$attrs('card')"
            :props="$props('card')"
            :theme="$theme"
        >
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
