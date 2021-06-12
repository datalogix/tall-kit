<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if ($label === false)
        {{ $slot }}
    @else
        <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
            <x-label
                :label="$label"
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'labelText') }}
            />

            {{ $slot }}
        </label>
    @endif

    @if($hasErrorAndShow($name))
        <x-errors
            :name="$name"
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'errors') }}
        />
    @endif
</div>
