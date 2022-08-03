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
                    :prefix="$prefix"
                    :key="$key"
                    :title="$title"
                    :parameters="array_merge($parameters, [$resource])"
                    :resource="$resource"
                    :force-menu="$forceMenu"
                    :max-actions="$maxActions"
                    :actions="$actions"
                    :route-name="$routeName"
                    :tooltip="$tooltip"
                    :theme="$theme"
                />

                @if ($back !== false)
                    <x-back
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-back') }}
                        preset="back-right"
                        :href="$back"
                        :text="$tooltip ? '' : null"
                        :tooltip="$tooltip"
                        :theme="$theme"
                    />
                @endif
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
                :prefix="$prefix"
                :key="$key"
                :title="$title"
                :parameters="array_merge($parameters, [$resource])"
                :resource="$resource"
                :force-menu="$forceMenu"
                :max-actions="$maxActions"
                :actions="$actions"
                :route-name="$routeName"
                :tooltip="$tooltip"
                :theme="$theme"
            />

            @if ($back !== false)
                <x-back
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-back') }}
                    preset="back-right"
                    :href="$back"
                    :text="$tooltip ? '' : null"
                    :tooltip="$tooltip"
                    :theme="$theme"
                />
            @endif
        @endisset
    </div>
</div>
