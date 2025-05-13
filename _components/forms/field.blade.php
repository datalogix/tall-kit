<div {{ $attrs() }}>
    @if ($groupable === false && $label === false)
        {{ $slot }}
    @elseif ($groupable === true && $label === false)
        <x-tallkit-field-group
            :prepend-text="$prependText"
            :prepend-icon="$prependIcon"
            :append-text="$appendText"
            :append-icon="$appendIcon"
            :attributes="$attrs('field-group')"
            :props="$props('field-group')"
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
        </x-tallkit-field-group>
    @else
        <label {{ $attrs('label') }}>
            <x-tallkit-label
                :label="$label"
                :attributes="$attrs('label-text')"
                :props="$props('label-text')"
                :theme="$theme"
            >
                {{ $labelContent ?? '' }}
            </x-tallkit-label>

            <x-tallkit-field-group
                :prepend-text="$prependText"
                :prepend-icon="$prependIcon"
                :append-text="$appendText"
                :append-icon="$appendIcon"
                :attributes="$attrs('field-group')"
                :props="$props('field-group')"
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
            </x-tallkit-field-group>
        </label>
    @endif

    @if ($hasErrorAndShow())
        <x-tallkit-field-error
            :name="$getFieldName()"
            :attributes="$attrs('field-error')"
            :props="$props('field-error')"
            :theme="$theme"
        />
    @endif

    @if ($display)
        <x-tallkit-display
            :value="$display"
            :attributes="$attrs('display')"
            :props="$props('display')"
            :theme="$theme"
        />
    @endif
</div>
