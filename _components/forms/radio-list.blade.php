@if ($options->isNotEmpty())
    <x-tallkit-group
        :name="$name"
        :label="$label"
        :inline="$inline"
        :grid="$grid"
        :fieldset="$fieldset"
        :show-errors="$showErrors"
        :attributes="$attrs()"
        :props="$props()"
        :theme="$theme"
    >
        @foreach ($options as $key => $option)
            <x-tallkit-radio
                :name="$name"
                :label="$option"
                :value="$key"
                :bind="$bind"
                :modifier="$modifier"
                :show-errors="false"
                :attributes="$attrs('radio')"
                :props="$props('radio')"
                :theme="$theme"
            />
        @endforeach
    </x-tallkit-group>
@endif
