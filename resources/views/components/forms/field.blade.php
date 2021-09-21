<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if ($groupable === false && $label === false)
        {{ $slot }}
    @elseif ($groupable === true && $label === false)
        <x-field-group
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'fieldGroup') }}
            :prependText="$prependText"
            :prependIcon="$prependIcon"
            :appendText="$appendText"
            :appendIcon="$appendIcon"
            :theme="$theme"
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
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'labelText') }}
                :label="$label"
                :theme="$theme"
            >
                {{ $labelContent ?? '' }}
            </x-label>

            <x-field-group
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'fieldGroup') }}
                :prependText="$prependText"
                :prependIcon="$prependIcon"
                :appendText="$appendText"
                :appendIcon="$appendIcon"
                :theme="$theme"
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
        <x-errors
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'errors') }}
            :name="$getFieldName()"
            :theme="$theme"
        />
    @endif
</div>
