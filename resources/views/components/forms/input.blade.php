<div {{ $themeProvider->{$type === 'hidden' ? 'hidden' : 'container'} }}">
    <label {{ $themeProvider->label }}>
        <x-label :label="$label" :class="$themeProvider->labelText" />

        <input
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

            {{ $attributes->merge(toArray($themeProvider->input)) }}
        />
    </label>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
