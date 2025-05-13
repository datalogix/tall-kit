@if ($options->isNotEmpty())
    <x-tallkit-group :attributes="$attr()">
        @foreach ($options as $key => $option)
            <x-tallkit-radio :attributes="$attr('radio')->merge(['label' => $options, 'value' => $key])" />
        @endforeach
    </x-tallkit-group>
@endif
