<x-form
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :method="$method"
    :action="$action"
    :theme="$theme"
>
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
                <x-submit
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-save') }}
                    preset="save"
                    :theme="$theme"
                />

                <x-back
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-back') }}
                    :theme="$theme"
                />
            @endisset
        </x-crud-header>
    @endisset

    <div {{ $attributes->mergeThemeProvider($themeProvider, 'content') }}>
        {{ $slot }}
    </div>

    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer') }}>
        @isset($actionsFooter)
            {{ $actionsFooter }}
        @elseif(isset($actions))
            {{ $actions }}
        @else
            <x-submit
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-save') }}
                preset="save"
                :theme="$theme"
            />

            <x-back
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-back') }}
                :theme="$theme"
            />
        @endisset
    </div>
</x-form>
