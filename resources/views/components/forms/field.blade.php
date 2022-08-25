<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if ($groupable === false && $label === false)
        {{ $slot }}
    @elseif ($groupable === true && $label === false)
        <x-field-group
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'field-group') }}
            :theme="$theme"
            :prepend-text="$prependText"
            :prepend-icon="$prependIcon"
            :append-text="$appendText"
            :append-icon="$appendIcon"
        >
            {{ $slot }}

            @isset ($prepend)
                <x-slot name="prepend">
                    {{ $prepend }}
                </x-slot>
            @endisset

            @isset ($append)
                <x-slot name="append">
                    {{ $append }}
                </x-slot>
            @endisset
        </x-field-group>
    @else
        <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
            <x-label
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label-text') }}
                :label="$label"
                :theme="$theme"
            >
                {{ $labelContent ?? '' }}
            </x-label>

            <x-field-group
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'field-group') }}
                :theme="$theme"
                :prepend-text="$prependText"
                :prepend-icon="$prependIcon"
                :append-text="$appendText"
                :append-icon="$appendIcon"
            >
                {{ $slot }}

                @isset ($prepend)
                    <x-slot name="prepend">
                        {{ $prepend }}
                    </x-slot>
                @endisset

                @isset ($append)
                    <x-slot name="append">
                        {{ $append }}
                    </x-slot>
                @endisset
            </x-field-group>
        </label>
    @endif

    @if ($hasErrorAndShow())
        <x-field-error
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'field-error') }}
            :name="$getFieldName()"
            :theme="$theme"
        />
    @endif

    @if ($display)
        <x-display
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'display') }}
            :value="$display"
            :theme="$theme"
        />
    @endif
</div>
