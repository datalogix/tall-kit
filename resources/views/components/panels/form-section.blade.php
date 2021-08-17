<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'section') }}>
        <x-section
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'title') }}
            :title="$title"
            :subtitle="$subtitle"
            :theme="$theme"
        >
            {{ $description ?? '' }}
        </x-section>
    </div>

    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'form') }}>
        <x-card
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'card') }}
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
        </x-card>
    </div>
</div>
