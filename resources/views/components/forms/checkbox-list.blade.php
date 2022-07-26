@if ($options->isNotEmpty())
    <div {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'container')
            ->merge(['x-init' => 'setup(\''.$name.'\')'])
    }}>
        <x-group
            {{ $attributes->mergeThemeProvider($themeProvider, 'group') }}
            :name="$name"
            :label="$label"
            :inline="$inline"
            :grid="$grid"
            :fieldset="$fieldset"
            :show-errors="$showErrors"
            :theme="$theme"
        >
            @if ($selectAll || $deselectAll)
                <x-slot name="header">
                    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header') }}>
                        <x-label
                            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label-text') }}
                            :label="$label"
                            :theme="$theme"
                        >
                            {{ $labelContent ?? '' }}
                        </x-label>

                        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'actions') }}>
                            @if ($selectAll)
                                <x-button
                                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'select-all') }}
                                    preset="select-all"
                                />
                            @endif

                            @if ($deselectAll)
                                <x-button
                                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'deselect-all') }}
                                    preset="deselect-all"
                                />
                            @endif
                        </div>
                    </div>
                </x-slot>
            @endif

            @foreach ($options as $key => $option)
                <x-checkbox
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'checkbox') }}
                    :name="$name"
                    :label="$option"
                    :value="$key"
                    :bind="$bind"
                    :show-errors="false"
                    :theme="$theme"
                />
            @endforeach
        </x-group>
    </div>
@endif
