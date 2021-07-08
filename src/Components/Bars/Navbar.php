<?php

namespace TALLKit\Components\Bars;

use TALLKit\Components\Menus\Menu;

class Navbar extends Menu
{
    /**
     * Get item.
     *
     * @return array
     */
    public function item()
    {
        return $this->attributes
            ->mergeOnlyThemeProvider($this->themeProvider, 'item')
            ->merge([
                'theme:item.except.class' => true,
                'theme:active.except.class' => true,
                'theme:active' => $this->attributes
                    ->mergeOnlyThemeProvider($this->themeProvider, 'active')
                    ->get('class'),
            ])
            ->getAttributes();
    }
}
