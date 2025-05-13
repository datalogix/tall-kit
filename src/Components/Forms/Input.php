<?php

namespace TALLKit\Components\Forms;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use TALLKit\View\Attr;

class Input extends Field
{
    protected function props(): array
    {
        return array_merge(parent::props(), [
            'id' => null,
            'type' => null,
            'value' => null,
            'bind' => null,
            'modifier' => null,
            'default' => null,
            'mask' => null,
            'cleave' => null,
            'choices' => null,
            'tagify' => null,
            'language' => null,
            'groupable' => true,
        ]);
    }

    protected function processed(array $data)
    {
        $this->id ??= str($this->name)->endsWith('[]') ? false : $this->name;
        $this->type ??= $this->getType();

        if ($this->language && !str($this->name)->endsWith("[$this->language]")) {
            $this->name = "{$this->name}[{$this->language}]";
        }

        if ($this->type !== 'password') {
            $this->value ??= $this->getValue($this->bind, $this->default, $this->language) ?? $data['slot'];
        }

        $this->label = $this->type === 'hidden' || $this->tagify ? false : $this->label;
        $this->display ??= $this->type === 'file' ? $this->value : false;
        $this->mask = $this->getMask();
    }

    protected function attrs()
    {
        return [
            'root' => Attr::make(
                attributes: [
                    'name' => $this->name,
                    'label' => $this->label,
                    'label-wrapper' => $this->labelWrapper,
                    'show-errors' => $this->showErrors,
                    'groupable' => $this->groupable,
                    'icon' => $this->icon,
                    'icon-left' => $this->iconLeft,
                    'icon-right' => $this->iconRight,
                    'prepend' => $this->prepend,
                    'append' => $this->append,
                    'display' => $this->display,
                ],
            )->when($this->type === 'hidden', fn ($attr) => $attr->class('hidden')),

            'input' => Attr::make(
                attributes: ['type' => $this->type],
                class: 'block w-full py-2 px-3 outline-none focus:outline-none',
            )
                ->when($this->name, fn ($attr, $value) => $attr->attr('name', $value))
                ->when($this->id, fn ($attr, $value) => $attr->attr('id', $value))
                ->when(
                    $this->isModel() && $this->name,
                    fn ($attr) => $attr->attr('x-model' . $this->modelModifier($this->modifier), $this->modelName($this->name))
                )->when(
                    $this->isWired() && $this->name,
                    fn ($attr) => $attr->attr('wire:model' . $this->wireModifier($this->modifier), $this->name),
                    fn ($attr) => $attr->attr('value', $this->value)
                )
                ->when($this->mask, fn ($attr) => $attr->merge(Attr::make(
                    attributes: ['x-ref' => 'element'],
                    component: 'mask',
                    setup: json_encode((object) (is_array($this->mask) ? $this->mask : ['mask' => $this->mask]))
                )))
                ->when(is_array($this->cleave), fn ($attr) => $attr->merge(Attr::make(
                    attributes: ['x-ref' => 'element'],
                    component: 'cleave',
                    setup: json_encode((object) $this->cleave)
                )))
                ->when($this->choices, fn ($attr) => $attr->merge(Attr::make(
                    attributes: ['x-ref' => 'element'],
                    component: 'choices',
                    setup: json_encode((object) (is_array($this->choices) ? $this->choices : []))
                )))
                ->when($this->tagify, fn ($attr) => $attr->merge(Attr::make(
                    attributes: ['x-ref' => 'element'],
                    component: 'tagify',
                    setup: json_encode((object) (is_array($this->tagify) ? $this->tagify : []))
                ))),
        ];
    }

    protected function getType()
    {
        if (!$this->name) {
            return 'text';
        }

        $types = [
            'color' => ['color'],
            'date' => ['date', 'birthdate', 'birth_date', '_at'],
            'datetime-local' => ['datetime', 'date_time'],
            'email' => ['email'],
            'file' => ['image', 'picture', 'photo', 'logo', 'background', 'audio', 'video', 'file', 'document'],
            'password' => ['password', 'password_confirmation', 'new_password', 'new_password_confirmation'],
            'url' => ['url', 'website', 'youtube', 'vimeo', 'facebook', 'twitter', 'instagram', 'linkedin'],
            'time' => ['time'],
        ];

        foreach ($types as $type => $names) {
            if (Str::contains($this->name, $names)) {
                return $type;
            }
        }

        return 'text';
    }

    protected function getMask()
    {
        if ($this->mask === false || is_array($this->mask)) {
            return $this->mask;
        }

        $maskes = [
            '00000-000' => ['cep', 'zipcode', 'zip-code'],
            '00/00/0000' => ['date', 'birthdate', 'birth_date', '_at'],
            '00/00/0000 00:00' => ['datetime', 'date_time'],
            '00:00' => ['time'],
            '000.000.000-00' => ['cpf'],
            '00.000.000/0000-00' => ['cnpj'],
            '(00) 00000000[0]' => ['phone', 'whatsapp'],
        ];

        if (!is_null($this->mask)) {
            foreach ($maskes as $maskValue => $names) {
                if (Str::contains($this->mask, $names)) {
                    return $maskValue;
                }
            }

            return $this->mask;
        }

        foreach ($maskes as $maskValue => $names) {
            if (Str::contains($this->name, $names)) {
                return $maskValue;
            }
        }

        return null;
    }

    /**
     * Format value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    protected function formatValue($value)
    {
        // date | datetime-local | time
        if ($value instanceof Carbon) {
            switch ($this->type) {
                case 'date':
                    return $value->format('Y-m-d');
                    break;
                case 'datetime-local':
                    return $value->format('Y-m-d\TH:i');
                    break;
                case 'week':
                    return $value->format('Y-\WW');
                    break;
                case 'time':
                    return $value->format('H:i');
                    break;
                case 'month':
                    return $value->format('Y-m');
                    break;
            }
        }

        // Storage
        if (
            is_string($value)
            && !filter_var($value, FILTER_VALIDATE_IP)
            && !filter_var($value, FILTER_VALIDATE_MAC)
            && !filter_var($value, FILTER_VALIDATE_URL)
            && !filter_var($value, FILTER_VALIDATE_EMAIL)
            && !filter_var($value, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME)
            && pathinfo($value, PATHINFO_EXTENSION)
            && Storage::exists($value)
        ) {
            return Storage::url($value);
        }

        return $value;
    }
}
