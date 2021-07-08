<div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
    @if ($groupable === false && $label === false)
        {{ $slot }}
    @elseif ($groupable === true && $label === false)
        <x-field-group
            :theme="$theme"
            :prependText="$prependText"
            :prependIcon="$prependIcon"
            :appendText="$appendText"
            :appendIcon="$appendIcon"
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
            >{{ $labelContent ?? '' }}</x-label>

            <x-field-group
                :theme="$theme"
                :prependText="$prependText"
                :prependIcon="$prependIcon"
                :appendText="$appendText"
                :appendIcon="$appendIcon"
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

    @if ($hasErrorAndShow($name))
        <x-errors
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'errors') }}
            :name="$name"
            :theme="$theme"
        />
    @endif
</div>
