<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup(\''.$url.'\', '.$default.', \''.$autoload.'\', '.$jsonOptions().')'])
}}>
    {{ $header ?? '' }}

    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'content') }}>
        @isset ($empty)
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'empty') }}>
                {{ $empty }}
            </div>
        @endisset

        <template x-if="isCompleted()">
            @isset ($completed)
                {{ $completed }}
            @else
                <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'completed') }}>
                    {{ $slot }}
                </div>
            @endisset
        </template>

        @isset ($loading)
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading') }}>
                {{ $loading }}
            </div>
        @else
            <x-loading {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading') }} />
        @endisset

        @isset ($error)
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'error') }}>
                {{ $error }}
            </div>
        @else
            <x-error {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'error') }} />
        @endisset
    </div>

    {{ $footer ?? '' }}
</div>
