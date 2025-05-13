<?php

namespace TALLKit\Components\Toolbar;

use TALLKit\Concerns\HasSetupColor;
use TALLKit\Concerns\HasSetupRounded;
use TALLKit\Concerns\HasSetupSize;
use TALLKit\Concerns\HasSetupVariant;
use TALLKit\View\Attr;
use TALLKit\View\BladeComponent;

class Toolbar extends BladeComponent
{
    use HasSetupColor;
    use HasSetupRounded;
    use HasSetupSize;
    use HasSetupVariant;

    protected array $packs = ['shadow'];

    protected function props(): array
    {
        return [
            'title' => config('app.name')
        ];
    }

    protected function attrs(): array
    {
        return [
            'root' => Attr::make(
                class: 'flex justify-between items-center gap-4 bg-white border-indigo-700 p-4 border-b-4',
            )->classFromPack([$this->colorClasses, $this->roundedClasses, $this->sizeClasses, $this->shadowClasses], 'root'),

            'left' => Attr::make(
                class: 'flex items-center space-x-2',
            ),

            'title' => Attr::make(
                class: 'flex-1 font-medium text-2xl',
            )->classFromPack([$this->colorClasses, $this->sizeClasses], 'title'),

            'right' => Attr::make(
                class: 'flex items-center space-x-2',
            ),
        ];
    }
}
