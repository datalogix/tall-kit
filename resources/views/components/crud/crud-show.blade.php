<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @isset($header)
        {{ $header }}
    @else
        <x-crud-header
            {{ $attributes->mergeThemeProvider($themeProvider, 'header') }}
            :title="$title"
            :theme="$theme"
        >
            @isset($actionsHeader)
                {{ $actionsHeader }}
            @elseif(isset($actions))
                {{ $actions }}
            @else
                <x-crud-actions
                    {{ $attributes->mergeThemeProvider($themeProvider, 'header-actions') }}
                    :custom-actions="$customActions"
                    :prefix="$prefix"
                    :parameters="array_merge($parameters, [$resource])"
                    :theme="$theme"
                />

                <x-back
                    {{ $attributes->mergeThemeProvider($themeProvider, 'header-back') }}
                    :theme="$theme"
                />
            @endisset
        </x-crud-header>
    @endisset

    {{ $slot }}

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
                {{ $attributes->mergeThemeProvider($themeProvider, 'footer-back') }}
                :theme="$theme"
            />
        @endisset
    </div>
</div>
