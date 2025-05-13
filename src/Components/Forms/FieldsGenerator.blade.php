@foreach (collect_value($fields) as $key => $field)
    <x-dynamic-component
        :component="$getFieldComponent($key, $field)"
        :options="$getFieldOptions($key, $field)"
        :name="target_get($field, 'name', $key)"
        :attributes="$attr('field')->merge(is_array($field) ? Arr::except($field, ['options', 'name']) : ['label' => $field])"
    />
@endforeach
