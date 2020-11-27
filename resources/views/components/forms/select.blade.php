<div {{ $themeProvider->container }}>
    <label {{ $themeProvider->label }}>
        <x-label :label="$label" :class="$themeProvider->labelText" />

        <select
            {{ $attributes->merge(toArray($themeProvider->{$multiple ? 'multiselect' : 'select'})) }}
            @if($isWired())
                wire:model="{{ $name }}"
            @else
                name="{{ $name }}"
            @endif

            @if($multiple)
                multiple
            @endif
        >
            @if($emptyOption && !$multiple)
                <option value="">{{ $emptyOption === true ? '---' : $emptyOption }}</option>
            @endif

            @forelse($options as $key => $option)
                <option value="{{ $key }}" @if($isSelected($key)) selected="selected" @endif>
                    {{ $option }}
                </option>
            @empty
                {{ $slot }}
            @endforelse
        </select>
    </label>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
