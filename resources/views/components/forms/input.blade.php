<div {{ $themeProvider->{$type === 'hidden' ? 'hidden' : 'container'} }}">
    <label {{ $themeProvider->label }}>
        <x-label :label="$label" :class="$themeProvider->labelText" />

        <input {{ $attributes->merge(toArray($themeProvider->input))->merge($themeProvider->types->get($type, [])) }}
            type="{{ $type }}"

            @if($id)
                id="{{ $id }}"
            @endif

            @if($isWired())
                wire:model="{{ $name }}"
            @else
                name="{{ $name }}"
                value="{{ $value ?? $slot }}"
            @endif

            @if($mask)
                x-data="{
                    initMask: function (element) {
                        Inputmask({{ $maskOptions() }}).mask(element);
                    }
                }"
                x-init="initMask($el)"
            @endif
        />
    </label>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
