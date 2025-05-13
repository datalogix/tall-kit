<?php

namespace TALLKit\Components\Display;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Display extends BladeComponent
{
    protected array $props = [
        'value' => null,
        'bind' => null,
        'name' => null,
        'default' => null,
    ];

    protected function processed(array $data)
    {
        $this->value = $this->getValue();
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(),

            'img' => Attr::make(attributes: ['src' => $this->value]),

            'audio' => Attr::make(attributes: ['controls' => true]),

            'audio-source' => Attr::make(
                attributes: [
                    'src' => $this->value,
                    'type' => 'audio/mpeg',
                ]
            ),

            'video' => Attr::make(attributes: ['controls' => true]),

            'video-source' => Attr::make(
                attributes: [
                    'src' => $this->value,
                    'type' => 'video/mp4',
                ]
            ),

            'download' => Attr::make(
                attributes: [
                    'href' => $this->value,
                    'preset' => 'download',
                ]
            ),

            'check' =>  Attr::make(
                attributes: ['icon' => 'check'],
                class: 'fill-current w-6 h-6 text-green-500',
            ),

            'uncheck' =>  Attr::make(
                attributes: ['icon' => 'uncheck'],
                class: 'fill-current w-6 h-6 text-red-500',
            ),
        ];
    }

    protected function getValue()
    {
        $value ??= $this->value;
        $value ??= target_get(
            $this->bind,
            [$this->name.'_html', $this->name.'_component', $this->name.'_formatted', $this->name.'_url', $this->name],
            $this->default
        );

        // Remove _id for relation
        if (Str::endsWith($this->name, '_id')) {
            $value = target_get($this->bind, Str::replaceLast('_id', '', $this->name));
        }

        // Model - Relation
        if ($value instanceof Model) {
            $value = target_get($value, ['name', 'title', 'text']);
        }

        // Storage
        if (
            is_string($value)
            && ! filter_var($value, FILTER_VALIDATE_IP)
            && ! filter_var($value, FILTER_VALIDATE_MAC)
            && ! filter_var($value, FILTER_VALIDATE_URL)
            && ! filter_var($value, FILTER_VALIDATE_EMAIL)
            && ! filter_var($value, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME)
            && pathinfo($value, PATHINFO_EXTENSION)
            && Storage::exists($value)
        ) {
            $value = Storage::url($value);
        }

        // Date | DateTime
        if ($value instanceof Carbon) {
            $value = $value->format(__($value->toTimeString() === '00:00:00' ? 'm/d/Y' : 'm/d/Y H:i:s'));
        }

        return $value;
    }
}
