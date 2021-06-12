<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'section') }}>
        <x-section
            :title="$title"
            :subtitle="$subtitle"
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'title') }}
        >
            {{ $description ?? '' }}
        </x-section>
    </div>

    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'form') }}>
        <x-card>
            {{ $slot ?? '' }}

            @if(isset($actions))
                <x-slot name="footer">
                    {{ $actions }}
                </x-slot>
            @endif
        </x-card>
    </div>
</div>
