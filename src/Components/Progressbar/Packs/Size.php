<?php

namespace TALLKit\Components\Progressbar\Packs;

use TALLKit\Enum\Packs;
use TALLKit\ComponentPack;

class Size extends ComponentPack
{
    protected function default(): string
    {
        return Packs\Size::MD;
    }

    public function all(): array
    {
        return [
            Packs\Size::XS => 'h-2 text-xs leading-2',
            Packs\Size::SM => 'h-4 text-sm leading-4',
            Packs\Size::MD => 'h-6 text-base leading-6',
            Packs\Size::LG => 'h-8 text-lg leading-8',
            Packs\Size::XL => 'h-10 text-xl leading-10',
            Packs\Size::XL2 => 'h-12 text-2xl leading-12',
        ];
    }
}
