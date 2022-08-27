<x-form
    {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
    :init="$init"
    :method="$method"
    :action="$action"
    :route="$route"
    :bind="array_merge($parameters, [$resource])"
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
            @elseif(isset($actionsForm))
                {{ $actionsForm }}
            @else
                @if ($action !== false)
                    <x-submit
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-save') }}
                        preset="save"
                        :text="$tooltip ? '' : null"
                        :tooltip="$tooltip"
                        :theme="$theme"
                    />

                    @if (Route::has($prefix.'.show') || Route::has($prefix.'.view'))
                        @can(['show', 'view'], $model)
                            <x-submit
                                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-save-and-view') }}
                                preset="save-and-view"
                                :text="$tooltip ? '' : null"
                                :tooltip="$tooltip"
                                :theme="$theme"
                            />
                        @endcan
                    @endif
                @endif

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
        @elseif(isset($actionsForm))
            {{ $actionsForm }}
        @else
            @if ($action !== false)
                <x-submit
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-save') }}
                    preset="save"
                    :text="$tooltip ? '' : null"
                    :tooltip="$tooltip"
                    :theme="$theme"
                />


                @if (Route::has($prefix.'.show') || Route::has($prefix.'.view'))
                    @can(['show', 'view'], $model)
                        <x-submit
                            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'footer-save-and-view') }}
                            preset="save-and-view"
                            :text="$tooltip ? '' : null"
                            :tooltip="$tooltip"
                            :theme="$theme"
                        />
                    @endcan
                @endif
            @endif

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
</x-form>
