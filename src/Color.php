<?php

namespace TALLKit;

use TALLKit\Enum\Packs;
use TALLKit\ComponentPack;

class Color extends ComponentPack
{
    protected function default(): string
    {
        return config('wireui.style.duration') ?? Packs\Duration::BASE;
    }

    public function all(): array
    {
        return [
            Packs\Duration::NONE => 'rounded-none',
            Packs\Duration::SM   => 'rounded-sm',
            Packs\Duration::BASE => 'rounded',
            Packs\Duration::MD   => 'rounded-md',
            Packs\Duration::LG   => 'rounded-lg',
            Packs\Duration::XL   => 'rounded-xl',
            Packs\Duration::XL2  => 'rounded-2xl',
            Packs\Duration::XL3  => 'rounded-3xl',
            Packs\Duration::FULL => 'rounded-full',
        ];
/*
      $colorClasses = data_get([
            'default' => 'bg-blue-400',
            'blue' => 'bg-blue-400',
            'red' => 'bg-red-400',
            'green' => 'bg-green-400',
            'yellow' => 'bg-yellow-400',
            'info' => 'bg-blue-400',
            'danger' => 'bg-red-400',
            'error' => 'bg-red-400',
            'success' => 'bg-green-400',
            'ok' => 'bg-green-400',
            'warning' => 'bg-yellow-400',
            'warn' => 'bg-yellow-400',
            'indigo' => 'bg-indigo-400',
        ], $this->color);
        */
    }
}
