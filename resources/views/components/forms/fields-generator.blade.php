@foreach ($fields as $key => $field)
    <x-dynamic-component
        :component="$getFieldComponent($key, $field)"
        :options="$getFieldOptions($key, $field)"
        :name="target_get($field, 'name', $key)"
        :modifier="target_get($field, 'modifier')"
        :mask="target_get($field, 'mask')"
        :cleave="target_get($field, 'cleave')"
        :choices="target_get($field, 'choices')"
        :tagify="target_get($field, 'tagify')"
        :theme="target_get($field, 'theme', $theme)"
        {{
            $attributes->merge(is_array($field)
                ? Arr::except($field, ['name', 'mask', 'choices', 'cleave', 'tagify', 'options', 'theme'])
                : ['label' => $field]
            )
        }}
    />
@endforeach
