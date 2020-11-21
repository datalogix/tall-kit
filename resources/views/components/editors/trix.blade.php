<div {{ $themeProvider->container }}>
    <x-label :label="$label" :class="$themeProvider->labelText" />

    <x-input
        type="hidden"
        :id="$id"
        :name="$name"
        :default="$slot->isEmpty() ? $default : $slot"
    />

    <trix-editor
        input="{{ $id }}"
        {{ $attributes->merge($themeProvider->trix->toArray()) }}
    ></trix-editor>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
