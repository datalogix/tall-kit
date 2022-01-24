<x-form
    {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
    :init="$init"
    :method="$method"
    :action="$action"
    :enctype="$enctype"
    :confirm="$confirm"
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
                    :text="$tooltip ? '' : null"
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
        @if ($fields)
            @bind($resource)
                <x-fields-generator :fields="$fields" />
            @endbind
        @endif

        {{ $slot }}
    </x-card>

    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer') }}>
        @isset($actionsFooter)
            {{ $actionsFooter }}
        @elseif(isset($actions))
            {{ $actions }}
        @else
            <x-submit
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-save') }}
                :text="$tooltip ? '' : null"
                :tooltip="$tooltip"
                preset="save"
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
</x-form>
