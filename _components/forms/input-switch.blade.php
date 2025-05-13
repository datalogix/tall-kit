<x-tallkit-field
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    <label {{ $attrs('label') }}>
        @if ($value === 1 && $isNotWired() && !Str::endsWith($name, '[]'))
            <input type="hidden" value="0" name="{{ $name }}" />
        @endif

        <input
            {{ $attrs('checkbox') }}
            type="checkbox"
            value="{{ $value }}"

            @if ($name)
                name="{{ $name }}"
            @endif

            @if ($isModel() && $name)
                x-model{!! $modelModifier($modifier) !!}="{{ $modelName($name) }}"
            @endif

            @if ($isWired() && $name)
                wire:model{!! $wireModifier($modifier) !!}="{{ $name }}"
            @endif

            @if ($checked)
                checked="checked"
            @endif
        />

        <div {{ $attrs('switch') }}></div>

        <x-tallkit-label
            :label="$label"
            :attributes="$attrs('label-text')"
            :props="$props('label-text')"
            :theme="$theme"
        >
            {{ $slot }}
        </x-tallkit-label>
    </label>
</x-tallkit-field>
