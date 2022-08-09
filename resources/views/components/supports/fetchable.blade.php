<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup(\''.$url.'\', \''.$autoload.'\', '.$jsonOptions().')'])
}}>
    {{ $header ?? '' }}

    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'content') }}>
        @isset ($empty)
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'empty') }}>
                {{ $empty }}
            </div>
        @endisset

        @isset ($loading)
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading') }}>
                {{ $loading }}
            </div>
        @else
            <x-loading {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading') }} />
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

        @isset ($failed)
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'failed') }}>
                {{ $failed }}
            </div>
        @endisset
    </div>

    {{ $footer ?? '' }}
</div>
