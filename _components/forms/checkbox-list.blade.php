@if ($options->isNotEmpty())
    <div {{ $attrs() }}>
        <x-tallkit-group
            :name="$name"
            :label="$label"
            :inline="$inline"
            :grid="$grid"
            :fieldset="$fieldset"
            :show-errors="$showErrors"
            :attributes="$attrs('group')"
            :props="$props('group')"
            :theme="$theme"
        >
            @if ($selectAll || $deselectAll)
                <x-slot name="header">
                    <div {{ $attrs('header') }}>
                        <x-tallkit-label
                            :label="$label"
                            :attributes="$attrs('label-text')"
                            :props="$props('label-text')"
                            :theme="$theme"
                        >
                            {{ $labelContent ?? '' }}
                        </x-tallkit-label>

                        <div {{ $attrs('actions') }}>
                            @if ($selectAll)
                                <x-tallkit-button
                                    preset="select-all"
                                    :attributes="$attrs('select-all')"
                                    :props="$props('select-all')"
                                    :theme="$theme"
                                />
                            @endif

                            @if ($deselectAll)
                                <x-tallkit-button
                                    preset="deselect-all"
                                    :attributes="$attrs('deselect-all')"
                                    :props="$props('deselect-all')"
                                    :theme="$theme"
                                />
                            @endif
                        </div>
                    </div>
                </x-slot>
            @endif

            @foreach ($options as $key => $option)
                <x-tallkit-checkbox
                    :name="$name"
                    :label="$option"
                    :value="$key"
                    :bind="$bind"
                    :modifier="$modifier"
                    :show-errors="false"
                    :attributes="$attrs('checkbox')"
                    :props="$props('checkbox')"
                    :theme="$theme"
                />
            @endforeach
        </x-tallkit-group>
    </div>
@endif
