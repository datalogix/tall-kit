<div {{ $attributes->merge(toArray($themeProvider->container)) }}>
    <x-label :label="$label" :class="$themeProvider->labelText" />

    <x-input
        type="hidden"
        id="{{ $id }}-input"
        :name="$name"
        :default="$slot->isEmpty() ? $default : $slot"
    />

    <div {{ $themeProvider->pickr->merge(['id' => $id]) }}></div>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
