<?php

namespace TALLKit\Components\Button;

use TALLKit\View\BladeComponent;

class Button extends BladeComponent
{
    protected array $props = [
        'text' => null,
        'type' => 'button',
        'active' => null,
        'href' => null,
        'route' => null,
        'target' => null,
        'click' => null,
        'wireClick' => null,
        'icon' => null,
        'iconLeft' => null,
        'iconRight' => null,
        'color' => 'default',
        'colorName' => null,
        'colorWeight' => null,
        'colorHover' => null,
        'rounded' => 'default',
        'shadow' => 'default',
        'outlined' => null,
        'linkText' => null,
        'bordered' => null,
        'loading' => null,
        'preset' => null,
        'tooltip' => null,
    ];
    /*
    if ($this->preset && $presetProperties = $this->themeProvider->presets->get($this->preset)) {
        $this->text = $text ?? target_get($presetProperties, 'text');
        $this->active = $active ?? target_get($presetProperties, 'active');
        $this->href = $href ?? target_get($presetProperties, 'href');
        $this->target = $target ?? target_get($presetProperties, 'target');
        $this->click = $click ?? target_get($presetProperties, 'click');
        $this->wireClick = $wireClick ?? target_get($presetProperties, 'wire-click');
        $this->iconLeft = $icon ?? $iconLeft ?? target_get($presetProperties, ['icon-left', 'icon']);
        $this->iconRight = $iconRight ?? target_get($presetProperties, 'icon-right');
        $this->color = $color ?? target_get($presetProperties, 'color', 'default');
        $this->rounded = $rounded ?? target_get($presetProperties, 'rounded', 'default');
        $this->shadow = $shadow ?? target_get($presetProperties, 'shadow', 'default');
        $this->outlined = $outlined ?? target_get($presetProperties, 'outlined');
        $this->linkText = $linkText ?? target_get($presetProperties, 'link-text');
        $this->bordered = $bordered ?? target_get($presetProperties, 'bordered');
        $this->loading = $loading ?? target_get($presetProperties, 'loading');
        $this->tooltip = is_string($tooltip) ? $tooltip : ($tooltip === true ? target_get($presetProperties, 'tooltip') : false);
    }

    if ($this->color && $colorProperties = $this->themeProvider->colors->get($this->color)) {
        $this->colorName = target_get($colorProperties, 'name', $colorProperties);
        $this->colorWeight = target_get($colorProperties, 'weight', 500);
        $this->colorHover = target_get($colorProperties, 'hover', 700);
    }
    }
    */

    protected function processed(array $data)
    {
        $this->href = route_detect(collect($this->href)->union($this->route)->toArray(), null, $this->href);
    }

    public function isActive()
    {
        if ($this->active) {
            return true;
        }

        if (! $this->href) {
            return false;
        }

        return request()->fullUrlIs($this->href.'*');
    }

    protected function attrs()
    {
        return [
            '_purge' => '
                hover:bg-gray-500
                hover:bg-gray-700
                hover:text-gray-500
                hover:text-gray-700
                border-gray-500
                border-gray-700
                bg-gray-500
                bg-gray-700
                text-gray-700
                text-gray-500
                hover:bg-blue-500
                hover:bg-blue-700
                hover:text-blue-500
                hover:text-blue-700
                border-blue-500
                border-blue-700
                bg-blue-500
                bg-blue-700
                text-blue-700
                text-blue-500
                hover:bg-red-500
                hover:bg-red-700
                hover:text-red-500
                hover:text-red-700
                border-red-500
                border-red-700
                bg-red-500
                bg-red-700
                text-red-700
                text-red-500
                hover:bg-green-500
                hover:bg-green-700
                hover:text-green-500
                hover:text-green-700
                border-green-500
                border-green-700
                bg-green-500
                bg-green-700
                text-green-700
                text-green-500
                hover:bg-yellow-500
                hover:bg-yellow-700
                hover:text-yellow-500
                hover:text-yellow-700
                border-yellow-500
                border-yellow-700
                bg-yellow-500
                bg-yellow-700
                text-yellow-700
                text-yellow-500
                hover:bg-indigo-500
                hover:bg-indigo-700
                hover:text-indigo-500
                hover:text-indigo-700
                border-indigo-500
                border-indigo-700
                bg-indigo-500
                bg-indigo-700
                text-indigo-700
                text-indigo-500
                hover:bg-purple-500
                hover:bg-purple-700
                hover:text-purple-500
                hover:text-purple-700
                border-purple-500
                border-purple-700
                bg-purple-500
                bg-purple-700
                text-purple-700
                text-purple-500
                hover:bg-pink-500
                hover:bg-pink-700
                hover:text-pink-500
                hover:text-pink-700
                border-pink-500
                border-pink-700
                bg-pink-500
                bg-pink-700
                text-pink-700
                text-pink-500
            ',

            'root' => [
                'wire:ignore' => '',
                'class' => 'inline-flex items-center space-x-2 py-2 px-3 transition outline-none focus:outline-none',
            ],

            'types' => [
                'link' => [],

                'button' => [],
            ],

            'loading1' => [
                'link' => [
                    'x-data' => 'window.tallkit.component(\'button\')',
                    'x-cloak' => '',
                    'x-init' => 'setup',
                    '@click' => 'click',
                ],

                'button' => [],

                'container' => [
                    ':disabled' => 'typeof isLoading === \'function\' && isLoading()',
                    ':class' => '{
                        \'cursor-wait\': typeof isLoading === \'function\' && isLoading(),
                        \'space-x-2\': typeof isLoading === \'function\' && !isLoading()
                    }',
                ],

                'content' => [
                    'class' => 'flex items-center space-x-2',

                    ':style' => '{
                        \'text-indent\': typeof isLoading === \'function\' && isLoading() ? \'-9999px\' : \'inherit\',
                    }',

                    ':class' => '{
                        \'invisible w-0\': typeof isLoading === \'function\' && isLoading(),
                    }',
                ],

                'component' => [
                    'style' => 'display: none;',
                    'x-show' => 'typeof isLoading === \'function\' && isLoading()',
                ],
            ],

            'icon-left' => [],

            'icon-right' => [],

            'text' => [
                'class' => 'flex-1 text-left',
            ],

            'colors' => [
                'default' => [
                    'name' => 'gray',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'gray' => [
                    'name' => 'gray',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'info' => [
                    'name' => 'blue',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'blue' => [
                    'name' => 'blue',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'error' => [
                    'name' => 'red',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'danger' => [
                    'name' => 'red',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'red' => [
                    'name' => 'red',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'success' => [
                    'name' => 'green',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'ok' => [
                    'name' => 'green',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'green' => [
                    'name' => 'green',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'warning' => [
                    'name' => 'yellow',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'warn' => [
                    'name' => 'yellow',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'yellow' => [
                    'name' => 'yellow',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'indigo' => [
                    'name' => 'indigo',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'purple' => [
                    'name' => 'purple',
                    'weight' => 500,
                    'hover' => 700,
                ],

                'pink' => [
                    'name' => 'pink',
                    'weight' => 500,
                    'hover' => 700,
                ],
            ],

            'roundeds' => [
                'default' => [
                    'class' => 'rounded',
                ],

                'sm' => [
                    'class' => 'rounded-sm',
                ],

                'md' => [
                    'class' => 'rounded-md',
                ],

                'lg' => [
                    'class' => 'rounded-lg',
                ],

                'full' => [
                    'class' => 'rounded-full',
                ],

                'none' => [
                    'class' => 'rounded-none',
                ],
            ],

            'shadows' => [
                'default' => [
                    'class' => 'shadow',
                ],

                'xs' => [
                    'class' => 'shadow-xs',
                ],

                'sm' => [
                    'class' => 'shadow-sm',
                ],

                'md' => [
                    'class' => 'shadow-md',
                ],

                'lg' => [
                    'class' => 'shadow-lg',
                ],

                'xl' => [
                    'class' => 'shadow-xl',
                ],

                '2xl' => [
                    'class' => 'shadow-2xl',
                ],

                'inner' => [
                    'class' => 'shadow-inner',
                ],

                'outline' => [
                    'class' => 'shadow-outline',
                ],

                'none' => [
                    'class' => 'shadow-none',
                ],
            ],

            'presets' => [
                'none' => [
                    'color' => 'none',
                    'rounded' => 'none',
                    'shadow' => 'none',
                ],

                'trigger' => [
                    'text' => 'Options',
                    'tooltip' => 'Options',
                    'color' => 'none',
                    'icon' => 'dots-vertical',
                ],

                'show' => [
                    'text' => 'Show',
                    'tooltip' => 'Show',
                    'color' => 'default',
                    'icon' => 'eye',
                    'loading' => 'Showing',
                ],

                'add' => [
                    'text' => 'Add',
                    'tooltip' => 'Add',
                    'color' => 'success',
                    'icon' => 'plus',
                    'loading' => 'Adding',
                ],

                'create' => [
                    'text' => 'Create',
                    'tooltip' => 'Create',
                    'color' => 'success',
                    'icon' => 'plus',
                    'loading' => 'Creating',
                ],

                'create-many' => [
                    'text' => 'Create many',
                    'tooltip' => 'Create many',
                    'color' => 'success',
                    'icon' => 'plus-box-multiple-outline',
                    'loading' => 'Creating',
                ],

                'edit' => [
                    'text' => 'Edit',
                    'tooltip' => 'Edit',
                    'color' => 'info',
                    'icon' => 'pencil',
                    'loading' => 'Editing',
                ],

                'delete' => [
                    'text' => 'Delete',
                    'tooltip' => 'Delete',
                    'color' => 'error',
                    'icon' => 'delete',
                    'loading' => 'Deleting',
                ],

                'save' => [
                    'text' => 'Save',
                    'tooltip' => 'Save',
                    'color' => 'success',
                    'icon' => 'content-save',
                    'loading' => 'Saving',
                ],

                'save-and-view' => [
                    'text' => 'Save and view',
                    'tooltip' => 'Save and view',
                    'color' => 'success',
                    'icon' => 'content-save-check',
                    'loading' => 'Saving',
                ],

                'send' => [
                    'text' => 'Send',
                    'tooltip' => 'Send',
                    'color' => 'info',
                    'icon' => 'send',
                    'loading' => 'Sending',
                ],

                'finish' => [
                    'text' => 'Finish',
                    'tooltip' => 'Finish',
                    'color' => 'success',
                    'icon' => 'check',
                    'loading' => 'Finishing',
                ],

                'back' => [
                    'text' => 'Back',
                    'tooltip' => 'Back',
                    'color' => 'default',
                    'icon' => 'arrow-left',
                    'loading' => 'Returning',
                ],

                'back-right' => [
                    'text' => 'Back',
                    'tooltip' => 'Back',
                    'color' => 'default',
                    'icon-right' => 'arrow-right',
                    'loading' => 'Returning',
                ],

                'cancel' => [
                    'text' => 'Cancel',
                    'tooltip' => 'Cancel',
                    'color' => 'none',
                    'loading' => 'Canceling',
                ],

                'enter' => [
                    'text' => 'Enter',
                    'tooltip' => 'Enter',
                    'color' => 'indigo',
                    'icon' => 'login',
                    'loading' => 'Entering',
                ],

                'update' => [
                    'text' => 'Update',
                    'tooltip' => 'Update',
                    'color' => 'info',
                    'icon' => 'content-save',
                    'loading' => 'Updating',
                ],

                'download' => [
                    'target' => '_blank',
                    'text' => 'Download',
                    'tooltip' => 'Download',
                    'color' => 'indigo',
                    'icon' => 'download',
                    'loading' => 'Downloading',
                ],

                'view' => [
                    'text' => 'View',
                    'tooltip' => 'View',
                    'color' => 'default',
                    'icon' => 'eye',
                    'loading' => 'Viewing',
                ],

                'move-up' => [
                    'text' => 'Move up',
                    'tooltip' => 'Move up',
                    'color' => 'success',
                    'icon' => 'arrow-up',
                    'loading' => 'Moving',
                ],

                'move-down' => [
                    'text' => 'Move down',
                    'tooltip' => 'Move down',
                    'color' => 'success',
                    'icon' => 'arrow-down',
                    'loading' => 'Moving',
                ],

                'copy' => [
                    'text' => 'Copy',
                    'tooltip' => 'Copy',
                    'color' => 'warning',
                    'icon' => 'content-copy',
                    'loading' => 'Copying',
                ],

                'duplicate' => [
                    'text' => 'Duplicate',
                    'tooltip' => 'Duplicate',
                    'color' => 'purple',
                    'icon' => 'content-duplicate',
                    'loading' => 'Duplicating',
                ],

                'search' => [
                    'text' => 'Search',
                    'tooltip' => 'Search',
                    'color' => 'info',
                    'icon' => 'search',
                    'loading' => 'Searching',
                ],

                'login' => [
                    'text' => 'Login',
                    'tooltip' => 'Login',
                    'color' => 'none',
                    'rounded' => 'none',
                    'shadow' => 'none',
                    'icon' => 'login',
                    'loading' => true,
                ],

                'logout' => [
                    'text' => 'Logout',
                    'tooltip' => 'Logout',
                    'color' => 'none',
                    'rounded' => 'none',
                    'shadow' => 'none',
                    'icon' => 'logout',
                    'loading' => true,
                ],

                'select-all' => [
                    'text' => 'Select All',
                    'link-text' => true,
                    'color' => 'blue',
                    'rounded' => 'none',
                    'shadow' => 'none',
                    'icon' => 'checkbox-marked-outline',
                ],

                'deselect-all' => [
                    'text' => 'Deselect All',
                    'link-text' => true,
                    'color' => 'blue',
                    'rounded' => 'none',
                    'shadow' => 'none',
                    'icon' => 'checkbox-blank-outline',
                ],

                'menu' => [
                    'color' => 'none',
                    'rounded' => 'none',
                    'shadow' => 'none',
                    'icon' => [
                        'name' => 'menu',
                        'class' => '!w-6 !h-6',
                    ],
                ],

                'toggler' => [
                    'color' => 'none',
                    'rounded' => 'none',
                    'shadow' => 'none',
                    'icon' => [
                        'name' => 'toggler',
                        'class' => '!w-6 !h-6',
                    ],
                ],

                'prev' => [
                    'text' => 'Previous',
                    'color' => 'blue',
                    'icon' => 'arrow-left',
                ],

                'next' => [
                    'text' => 'Next',
                    'color' => 'blue',
                    'icon-right' => 'arrow-right',
                ],

                'payment' => [
                    'text' => 'Payment',
                    'tooltip' => 'Payment',
                    'color' => 'green',
                    'icon' => 'payment',
                    'loading' => true,
                ],

                'pay' => [
                    'text' => 'Pay',
                    'tooltip' => 'Pay',
                    'color' => 'green',
                    'icon' => 'payment',
                    'loading' => 'Paying',
                ],
            ],
        ];
    }
}
/*

<{{ $href ? 'a' : 'button' }} {{
    $attrs('container', false, [
        'types' => $href ? 'link' : 'button',
        'roundeds' => $rounded,
        'shadows' => $shadow,
    ])
        ->mergeOnlyThemeProvider($themeProvider, $loading ? 'loading' : null, $loading ? ($href ? 'link' : 'button') : null)
        ->mergeOnlyThemeProvider($themeProvider, $loading ? 'loading' : null, $loading ? 'container' : null)
        ->merge($outlined && $colorName ? [
            'class' => 'bg-transparent hover:bg-'.$colorName.'-'.$colorWeight.' text-'.$colorName.'-'.$colorHover.' hover:text-white border border-'.$colorName.'-'.$colorWeight.' hover:border-transparent',
        ] : [])
        ->merge($linkText && $colorName ? [
            'class' => 'hover:text-'.$colorName.'-'.$colorHover,
        ] : [])
        ->merge($bordered && $colorName ? [
            'class' => 'border border-'.$colorName.'-'.$colorHover,
        ] : [])
        ->merge(! $outlined && ! $linkText && $colorName ? [
            'class' => 'bg-'.$colorName.'-'.$colorWeight.' hover:bg-'.$colorName.'-'.$colorHover.' text-white',
        ] : [])
        ->merge($isActive() ? $attrs('active')->getAttributes() : [])
        ->merge($tooltip ? ['data-tippy-content' => __($tooltip)] : [], false)
    }}
    @if ($href) href="{{ $href }}" @endif
    @if (! $href) type="{{ $type }}" @endif
    @if ($href && $target) target="{{ $target }}" @endif
    @if ($click) @click="{{ $click }}" @endif
    @if ($wireClick) wire:click="{{ $wireClick }}" @endif
>
    @if ($loading)<span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading', 'content', false) }}>@endif
        <x-tallkit-icon
            :attributes="$attrs('icon-left')->merge([
                'class' => target_get($iconLeft, 'class'),
                'style' => target_get($iconLeft, 'style')
            ])"
            :name="target_get($iconLeft, 'name', $iconLeft)"
            :theme="$theme"
        >
            @isset ($iconContent)
                {{ $iconContent }}
            @else
                {!! target_get($iconLeft, 'name', $iconLeft) !!}
            @endisset
        </x-tallkit-icon>

        @if ($slot->isNotEmpty() || $text)
            <span {{ $attrs('text') }}>
                {!! $slot->isEmpty() ? __($text) : $slot !!}
            </span>
        @endif

        <x-tallkit-icon
            :attributes="$attrs('icon-right')->merge([
                'class' => target_get($iconRight, 'class'),
                'style' => target_get($iconRight, 'style')
            ])"
            :name="target_get($iconRight, 'name', $iconRight)"
            :theme="$theme"
        >
            {!! target_get($iconRight, 'name', $iconRight) !!}
        </x-tallkit-icon>
    @if ($loading)</span>@endif

    @if ($loading)
        <x-tallkit-loading
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading', 'component', false) }}
            text="{!! is_string($loading) && ($slot->isNotEmpty() || $text) ? $loading : ($slot->isEmpty() ? __($text) : $slot) !!}"
            :theme="$theme"
        />
    @endif
</{{ $href ? 'a' : 'button' }}>

*/
