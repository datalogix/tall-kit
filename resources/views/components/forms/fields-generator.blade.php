@foreach ($fields as $key => $field)
    <x-dynamic-component
        :component="$getFieldComponent($key, $field)"
        :options="$getFieldOptions($key, $field)"
        :name="$field['name'] ?? $key"
        :mask="$field['mask'] ?? null"
        :cleave="$field['cleave'] ?? null"
        :tagify="$field['tagify'] ?? null"
        :theme="$field['theme'] ?? $theme"
        {{
            $attributes->merge(is_array($field)
                ? Arr::except($field, ['name', 'mask', 'cleave', 'tagify', 'options', 'theme'])
                : ['label' => $field]
            )
        }}
    />
@endforeach
