<div {{ $themeProvider->container }}>
    <label {{ $themeProvider->label }}>
        <input {{ $attributes->merge(toArray($themeProvider->radio)) }}
            type="radio"
            value="{{ $value }}"

            @if($isWired())
                wire:model="{{ $name }}"
            @else
                name="{{ $name }}"
            @endif

            @if($checked)
                checked="checked"
            @endif
        />

        <span {{ $themeProvider->labelText }}>{{ $slot->isEmpty() ? $label : $slot }}</span>
    </label>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
