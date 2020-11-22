<div
    x-data="{
        initPickr: function (element) {
            let pickr = Pickr.create({{ $jsonOptions() }});
            let input = document.getElementById('{{ $id . '-input' }}');
            pickr.on('save', function (color) {
                let currentColor = color ? color.toHEXA().toString() : '';
                input.setAttribute('value', currentColor);
                element.setAttribute('title', currentColor);
            });
        }
    }"
    x-init="initPickr($el)"
    {{ $attributes->merge($themeProvider->container->toArray())->merge(['title' => $value]) }}
>
    <x-label :label="$label" :class="$themeProvider->labelText" />

    <x-input
        type="hidden"
        id="{{ $id }}-input"
        :name="$name"
        :default="$slot"
    />

    <div {{ $themeProvider->pickr->merge(['id' => $id]) }}></div>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
