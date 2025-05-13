<?php

namespace TALLKit\Concerns;

use TALLKit\ComponentPack;

trait HasSetupRounded
{
    public mixed $squared = null;

    public mixed $rounded = null;

    public mixed $roundedClasses = null;

    protected function setupRounded(): void
    {
        /** @var ComponentPack $roundedPack */
        $roundedPack = resolve(config("wireui.{$this->config}.packs.rounders"));
        $roundedPack = new ComponentPack();

        $this->squared = $this->attributes->get('squared', false);

        $this->rounded = $this->attributes->get('rounded', false);

        $this->getRoundedClasses($roundedPack);

        $this->smartAttributes(['squared', 'rounded']);

        $this->setVariables(['squared', 'rounded', 'roundedClasses']);
    }

    private function getRoundedClasses(ComponentPack $roundedPack)
    {
        $config = config("wireui.{$this->config}.default.rounded");

        $fullRounded = $this->rounded && is_bool($this->rounded);

        $this->roundedClasses = match (true) {
            (bool) $this->squared => $roundedPack->get('none'),
            (bool) $fullRounded   => $roundedPack->get('full'),
            (bool) $this->rounded => $roundedPack->get($this->rounded),
            default               => $roundedPack->get($config),
        };
    }
}
