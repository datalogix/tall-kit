<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @isset($header)
        {{ $header }}
    @else
        <x-crud-header
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header') }}
            :title="$title"
            :theme="$theme"
        >
            @isset($actionsHeader)
                {{ $actionsHeader }}
            @elseif(isset($actions))
                {{ $actions }}
            @else
                <x-crud-actions
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-actions') }}
                    :custom-actions="$customActions"
                    :prefix="$prefix"
                    :parameters="array_merge($parameters, [$resource])"
                    :theme="$theme"
                />

                <x-back
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-back') }}
                    :theme="$theme"
                />
            @endisset
        </x-crud-header>
    @endisset

    <x-card {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'content') }}>
        {{ $slot }}
    </x-card>

    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer') }}>
        @isset($actionsFooter)
            {{ $actionsFooter }}
        @elseif(isset($actions))
            {{ $actions }}
        @else
            <x-crud-actions
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-actions') }}
                :custom-actions="$customActions"
                :prefix="$prefix"
                :parameters="array_merge($parameters, [$resource])"
                :theme="$theme"
            />

            <x-back
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-back') }}
                :theme="$theme"
            />
        @endisset
    </div>
</div>
