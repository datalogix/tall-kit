<div {{ $themeProvider->container }}>
    <label {{ $themeProvider->label }}>
        <x-label :label="$label" :class="$themeProvider->labelText" />

        <textarea {{ $attributes->merge(toArray($themeProvider->textarea)) }}
            @if($id)
                id="{{ $id }}"
            @endif

            @if($isWired())
                wire:model="{{ $name }}"
            @else
                name="{{ $name }}"
            @endif
        >@unless($isWired()){{ $value ?? $slot }}@endunless</textarea>
    </label>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
