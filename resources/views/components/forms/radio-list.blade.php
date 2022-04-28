@if ($options->isNotEmpty())
    <x-group
        {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
        :name="$name"
        :label="$label"
        :inline="$inline"
        :grid="$grid"
        :fieldset="$fieldset"
        :show-errors="$showErrors"
        :theme="$theme"
    >
        @foreach ($options as $key => $option)
            <x-radio
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'radio') }}
                :name="$name"
                :label="$option"
                :value="$key"
                :bind="$bind"
                :show-errors="false"
                :theme="$theme"
            />
        @endforeach
    </x-group>
@endif
