<div {{ $themeProvider->container }}>
    <x-label :label="$label" :class="$themeProvider->labelText" />

    <x-input
        type="hidden"
        :id="$id"
        :name="$name"
        :default="$slot"
    />

    <div
        x-data="{
            initQuill: function (element) {
                let quill = new Quill(element, {{ $jsonOptions() }});
                let input = document.getElementById('{{ $id }}');

                if (input.value) {
                    quill.setContents(JSON.parse(input.value).ops);
                }

                (function() {
                     let inputEvent = new Event('input');
                     quill.on('text-change', function(delta, oldDelta, source) {
                        input.value = JSON.stringify(quill.getContents());
                        input.dispatchEvent(inputEvent);
                     });
                })();
            }
        }"
        x-init="initQuill($el)"
        {{ $attributes->merge($themeProvider->quill->toArray()) }}
    ></div>

    @if($hasErrorAndShow($name))
        <x-errors :name="$name" :class="$themeProvider->errors" />
    @endif
</div>
