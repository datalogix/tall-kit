<x-form
    {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
    :method="$method"
    :action="$action"
>
    @isset($header)
        {{ $header }}
    @else
        <x-crud-header
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header') }}
            :title="$title"
        >
            @isset($actionsHeader)
                {{ $actionsHeader }}
            @elseif(isset($actions))
                {{ $actions }}
            @else
                <x-submit
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-save') }}
                    preset="save"
                />

                <x-back
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-back') }}
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
            <x-submit
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-save') }}
                preset="save"
            />

            <x-back
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-back') }}
            />
        @endisset
    </div>
</x-form>
