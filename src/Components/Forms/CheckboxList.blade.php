@if ($options->isNotEmpty())
    <div {{ $attr() }}>
        <x-tallkit-group :attributes="$attr('group')">
            @if ($selectAll || $deselectAll)
                <x-slot name="header">
                    <div {{ $attr('header') }}>
                        <x-tallkit-label :attributes="$attr('label')">
                            {{ $labelContent ?? '' }}
                        </x-tallkit-label>

                        <div {{ $attr('actions') }}>
                            @if ($selectAll)
                                <x-tallkit-button :attributes="$attr('select-all')" />
                            @endif

                            @if ($deselectAll)
                                <x-tallkit-button :attributes="$attr('deselect-all')" />
                            @endif
                        </div>
                    </div>
                </x-slot>
            @endif

            @foreach ($options as $key => $option)
                <x-tallkit-checkbox :attributes="$attr('checkbox')->merge(['label' => $options, 'value' => $key])" />
            @endforeach
        </x-tallkit-group>
    </div>
@endif
