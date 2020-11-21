<div {{ $themeProvider->{$type === 'hidden' ? 'hidden' : 'container'} }}">
    <label {{ $themeProvider->label }}>
        <x-label :label="$label" :class="$themeProvider->labelText" />

        <input {{ $attributes->merge($themeProvider->input->toArray())->merge($themeProvider->types->get($type, [])) }}
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
                x-init="Inputmask({{ $maskOptions() }}).mask($el)"
            @endif
        />
    </label>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
