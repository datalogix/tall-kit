@foreach ($fields as $key => $field)
    <x-dynamic-component
        :component="$getFieldComponent($key, $field)"
        :options="$getFieldOptions($key, $field)"
        :name="data_get($field, 'name', $key)"
        :mask="data_get($field, 'mask')"
        :cleave="data_get($field, 'cleave')"
        :tagify="data_get($field, 'tagify')"
        :theme="data_get($field, 'theme', $theme)"
        {{
            $attributes->merge(is_array($field)
                ? Arr::except($field, ['name', 'mask', 'cleave', 'tagify', 'options', 'theme'])
                : ['label' => $field]
            )
        }}
    />
@endforeach
