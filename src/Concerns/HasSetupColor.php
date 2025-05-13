<?php

namespace TALLKit\Concerns;

use TALLKit\ComponentPack;

trait HasSetupColor
{
    public mixed $color = null;

    public mixed $colorClasses = null;

    private mixed $colorResolve = null;

    protected function setColorResolve(string $class): void
    {
        $this->colorResolve = $class;
    }

    protected function setupColor(): void
    {
        $colors = config($this->getColorConfigName());

        /** @var ComponentPack $colorPack */
        $colorPack = $colors ? resolve($colors) : resolve($this->colorResolve);

        $this->color = $this->getDataModifier('color', $colorPack);

        //$this->colorClasses = $colorPack->mergeIf($this->useValidation(), Color::INVALIDATED, $this->color);
        $this->colorClasses = '';

        if (method_exists($this, 'setColorPack')) {
            $this->setColorPack($colorPack);
        }

        $this->setVariables(['color', 'colorClasses']);
    }

    private function getColorConfigName(?string $variant = null): string
    {
        if ($variant) {
            return "wireui.{$this->config}.packs.colors.{$variant}";
        }

        if (property_exists($this, 'variant') && $this->variant) {
            return "wireui.{$this->config}.packs.colors.{$this->variant}";
        }

        return "wireui.{$this->config}.packs.colors";
    }
}
