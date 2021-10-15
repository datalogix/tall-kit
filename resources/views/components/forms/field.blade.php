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

    @if ($preview)
        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'preview') }}>
            @if (Str::endsWith($preview, ['.jpg', 'jpeg', 'gif', 'png']))
                <img {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'types', 'img') }} src="{{ $preview }}" />
            @elseif (Str::endsWith($preview, '.mp3'))
                <audio {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'types', 'audio') }}>
                    <source src="{{ $preview }}" type="audio/mpeg">
                </audio>
            @elseif (Str::endsWith($preview, '.mp4'))
                <video {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'types', 'video') }}>
                    <source src="{{ $preview }}" type="video/mp4">
                </video>
            @else
                <x-button
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'types', 'download') }}
                    href="{{ $preview }}"
                    preset="download"
                />
            @endif
        </div>
    @endif
</div>
