<div {{ $attributes->merge(toArray($themeProvider->container)) }}>
    <x-label :label="$label" :class="$themeProvider->labelText" />

    <div {{ $themeProvider->{$inline ? 'inline' : 'block'} }}>
        {{ $slot }}
    </div>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
