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
            @elseif(isset($actionsShow))
                {{ $actionsShow }}
            @else
                <x-crud-actions
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-actions') }}
                    :force-menu="$forceMenu"
                    :max-actions="$maxActions"
                    :actions="$actions"
                    :prefix="$prefix"
                    :parameters="array_merge($parameters, [$resource])"
                    :tooltip="$tooltip"
                    :theme="$theme"
                />

                <x-back
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-back') }}
                    preset="back-right"
                    :text="$tooltip ? '' : null"
                    :tooltip="$tooltip"
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
        @elseif(isset($actionsShow))
            {{ $actionsShow }}
        @else
            <x-crud-actions
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-actions') }}
                :force-menu="$forceMenu"
                :max-actions="$maxActions"
                :actions="$actions"
                :prefix="$prefix"
                :parameters="array_merge($parameters, [$resource])"
                :tooltip="$tooltip"
                :theme="$theme"
            />

            <x-back
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-back') }}
                preset="back-right"
                :text="$tooltip ? '' : null"
                :tooltip="$tooltip"
                :theme="$theme"
            />
        @endisset
    </div>
</div>
