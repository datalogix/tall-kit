<?php

namespace TALLKit\Components\Forms;

use Illuminate\Support\Str;
use TALLKit\View\BladeComponent;

class FieldsGenerator extends BladeComponent
{
    protected array $props = [
        'fields' => []
    ];

    public function getFieldComponent($key, $field)
    {
        $name = target_get($field, 'name', is_int($key) ? $field : $key);

        if (! $name || is_array($name)) {
            return 'tallkit-input';
        }

        if ($component = target_get($field, 'component')) {
            return $component;
        }

        if (target_get($field, 'options') || Str::endsWith($name, '_id')) {
            return 'tallkit-select';
        }

        $types = [
            'input-image' => ['image', 'picture', 'photo', 'logo', 'background'],
            'textarea' => ['message', 'comment'],
            'editor' => ['description', 'content', 'body'],
        ];

        foreach ($types as $component => $names) {
            if (Str::contains($name, $names)) {
                return 'tallkit-'.$component;
            }
        }

        return 'tallkit-input';
    }

    public function getFieldOptions($key, $field)
    {
        if ($options = target_get($field, 'options')) {
            return $options;
        }

        $name = target_get($field, 'name', is_int($key) ? $field : $key);

        if (is_string($name) && Str::endsWith($name, '_id') && $model = make_model(Str::replaceLast('_id', '', $name))) {
            return $model->get();
        }

        return null;
    }
}
