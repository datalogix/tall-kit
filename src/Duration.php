<?php

namespace TALLKit;

use TALLKit\Enum\Packs;
use TALLKit\ComponentPack;

class Duration extends ComponentPack
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
        $durationClasses =  data_get([
            'default' => 'duration-400',
            '100' => 'duration-100',
            '300' => 'duration-300',
            '500' => 'duration-500',
            '700' => 'duration-700',
            '1000' => 'duration-1000',
        ], $this->duration);*/
    }
}
