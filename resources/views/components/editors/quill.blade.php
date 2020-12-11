<div {{ $themeProvider->container }}>
    <x-label :label="$label" :class="$themeProvider->labelText" />

    <x-input
        type="hidden"
        :id="$id"
        :name="$name"
        :default="$slot->isEmpty() ? $default : $slot"
    />

    <div {{ $attributes->merge(toArray($themeProvider->quill)) }}></div>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
