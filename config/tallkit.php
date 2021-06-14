<?php

$locale = strtolower(substr(app()->getLocale(), 0, 2));

return [
    'prefix' => '',

    'options' => [

        /*
        |--------------------------------------------------------------------------
        | TALLKit Assets URL
        |--------------------------------------------------------------------------
        |
        | This value sets the path to TALLKit JavaScript assets, for cases where
        | your app's domain root is not the correct path. By default, TALLKit
        | will load its JavaScript assets from the app's "relative root".
        |
        | Examples: "/assets", "myurl.com/app".
        |
        */

        'asset_url' => null,

        /*
        |--------------------------------------------------------------------------
        | loadType
        |--------------------------------------------------------------------------
        |
        | Supported:
        |
        | data-tallkit-assets: Load only used assets, using the 'data-tallkit-assets' attribute.
        | true: Load all assets on 'options.assets'.
        | false: Disable load assets, you need to inject manually.
        |
        */

        'loadType' => 'data-tallkit-assets',

        /*
        |--------------------------------------------------------------------------
        | injectTailwindcss
        |--------------------------------------------------------------------------
        |
        | Enable when you want to inject tailwindcss directly from the CDN,
        | the url is in `assets.tailwindcss`.
        | This option is disabled for several reasons.
        | See https://tailwindcss.com/docs/installation#using-tailwind-via-cdn
        |
        */
        'injectTailwindcss' => false,
    ],

    'assets' => [
        /**
         * Tailwindcss.
         */
        'tailwindcss' => [
            'https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css',
        ],

        /**
         * Alpine.
         */
        'alpine' => [
            'https://cdn.jsdelivr.net/npm/alpinejs@2/dist/alpine.min.js',
        ],

        /**
         * Moment.
         */
        'moment' => [
            'https://cdn.jsdelivr.net/npm/moment@2/moment.min.js',
        ],

        /**
         * Forms.
         */
        'imask' => [
            'https://cdn.jsdelivr.net/npm/imask@6/dist/imask.min.js',
        ],

        /**
         * Pickers.
         */
        'flatpickr' => [
            'https://cdn.jsdelivr.net/npm/flatpickr@4/dist/flatpickr.min.css',
            'https://cdn.jsdelivr.net/npm/flatpickr@4/dist/flatpickr.min.js',
            $locale != 'en' ? 'https://cdn.jsdelivr.net/npm/flatpickr@4/dist/l10n/'.$locale.'.min.js' : '',
        ],

        'pickr' => [
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr@1/dist/themes/classic.min.css',
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr@1/dist/pickr.min.js',
        ],

        'pikaday' => [
            'https://cdn.jsdelivr.net/npm/pikaday@1/css/pikaday.min.css',
            'https://cdn.jsdelivr.net/npm/pikaday@1/pikaday.min.js',
        ],

        /**
         * Editors.
         */
        'easymde' => [
            'https://cdn.jsdelivr.net/npm/easymde@2/dist/easymde.min.css',
            'https://cdn.jsdelivr.net/npm/easymde@2/dist/easymde.min.js',
        ],

        'quill' => [
            'https://cdn.jsdelivr.net/npm/quill@1/dist/quill.snow.min.css',
            'https://cdn.jsdelivr.net/npm/quill@1/dist/quill.min.js',
        ],

        'trix' => [
            'https://cdn.jsdelivr.net/npm/trix@1/dist/trix.min.css',
            'https://cdn.jsdelivr.net/npm/trix@1/dist/trix.min.js',
        ],
    ],

    'components' => [
        /**
         * Alerts.
         */
        'alert' => \TALLKit\Components\Alerts\Alert::class,

        /**
         * Buttons.
         */
        'button' => \TALLKit\Components\Buttons\Button::class,
        'bt' => \TALLKit\Components\Buttons\Button::class, // alias
        'btn' => \TALLKit\Components\Buttons\Button::class, // alias
        'form-button' => \TALLKit\Components\Buttons\FormButton::class,
        'form-bt' => \TALLKit\Components\Buttons\FormButton::class, // alias
        'form-btn' => \TALLKit\Components\Buttons\FormButton::class, // alias
        'logout' => \TALLKit\Components\Buttons\Logout::class,

        /**
         * Editors.
         */
        'editor' => \TALLKit\Components\Editors\Quill::class, // alias
        'easymde' => \TALLKit\Components\Editors\Easymde::class,
        'easy-mde' => \TALLKit\Components\Editors\Easymde::class, // alias
        'mde' => \TALLKit\Components\Editors\Easymde::class, // alias
        'quill' => \TALLKit\Components\Editors\Quill::class,
        'trix' => \TALLKit\Components\Editors\Trix::class,

        /**
         * Forms.
         */
        'checkbox' => \TALLKit\Components\Forms\Checkbox::class,
        'check' => \TALLKit\Components\Forms\Checkbox::class, // alias
        'errors' => \TALLKit\Components\Forms\Errors::class,
        'error' => \TALLKit\Components\Forms\Errors::class, // alias
        'field' => \TALLKit\Components\Forms\Field::class, // alias
        'form-field' => \TALLKit\Components\Forms\Field::class,
        'form' => \TALLKit\Components\Forms\Form::class,
        'group' => \TALLKit\Components\Forms\Group::class,
        'field-group' => \TALLKit\Components\Forms\Group::class, // alias
        'form-group' => \TALLKit\Components\Forms\Group::class, // alias
        'input' => \TALLKit\Components\Forms\Input::class,
        'label' => \TALLKit\Components\Forms\Label::class,
        'lbl' => \TALLKit\Components\Forms\Label::class, // alias
        'radio' => \TALLKit\Components\Forms\Radio::class,
        'select' => \TALLKit\Components\Forms\Select::class,
        'submit' => \TALLKit\Components\Forms\Submit::class,
        'textarea' => \TALLKit\Components\Forms\Textarea::class,
        'validation-errors' => \TALLKit\Components\Forms\ValidationErrors::class,
        'validation' => \TALLKit\Components\Forms\ValidationErrors::class, // alias

        /**
         * Icons.
         */
        'icon' => \TALLKit\Components\Icons\Icon::class,

        /**
         * Layouts.
         */
        'auth' => \TALLKit\Components\Layouts\AuthenticationCard::class, //alias
        'auth-card' => \TALLKit\Components\Layouts\AuthenticationCard::class, //alias
        'authentication' => \TALLKit\Components\Layouts\AuthenticationCard::class,
        'authentication-card' => \TALLKit\Components\Layouts\AuthenticationCard::class, //alias
        'card' => \TALLKit\Components\Layouts\Card::class,
        'form-section' => \TALLKit\Components\Layouts\FormSection::class,
        'html' => \TALLKit\Components\Layouts\Html::class,
        'section' => \TALLKit\Components\Layouts\Section::class,
        'meta' => \TALLKit\Components\Layouts\SocialMeta::class, //alias
        'social-meta' => \TALLKit\Components\Layouts\SocialMeta::class,
        'socialmeta' => \TALLKit\Components\Layouts\SocialMeta::class, //alias

        /**
         * Modals.
         */
        'modal' => \TALLKit\Components\Modals\Modal::class,

        /**
         * Navigations.
         */
        'dropdown' => \TALLKit\Components\Navigations\Dropdown::class,
        'menu' => \TALLKit\Components\Navigations\Menu::class,
        'menu-item' => \TALLKit\Components\Navigations\MenuItem::class,
        'menuitem' => \TALLKit\Components\Navigations\MenuItem::class,

        /**
         * Pickers.
         */
        'datetime-picker' => \TALLKit\Components\Pickers\Flatpickr::class, // alias
        'datetimepicker' => \TALLKit\Components\Pickers\Flatpickr::class, // alias
        'flatpickr' => \TALLKit\Components\Pickers\Flatpickr::class,

        'color-picker' => \TALLKit\Components\Pickers\Pickr::class, // alias
        'colorpicker' => \TALLKit\Components\Pickers\Pickr::class, // alias
        'pickr' => \TALLKit\Components\Pickers\Pickr::class,

        'date-picker' => \TALLKit\Components\Pickers\Pikaday::class, // alias
        'datepicker' => \TALLKit\Components\Pickers\Pikaday::class, // alias
        'pikaday' => \TALLKit\Components\Pickers\Pikaday::class,

        /**
         * Tables.
         */
        'table' => \TALLKit\Components\Tables\Table::class,
        'heading' => \TALLKit\Components\Tables\Heading::class,
        'head' => \TALLKit\Components\Tables\Heading::class, // alias
        'th' => \TALLKit\Components\Tables\Heading::class, // alias
        'row' => \TALLKit\Components\Tables\Row::class,
        'tr' => \TALLKit\Components\Tables\Row::class, // alias
        'cell' => \TALLKit\Components\Tables\Cell::class,
        'td' => \TALLKit\Components\Tables\Cell::class, // alias
    ],

    'themes' => [
        'default' => [
            /**
             * Alerts.
             */
            'alert' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'class' => 'flex flex-row p-5 rounded relative',
                    'role' => 'alert',
                    'style' => 'display: none;',
                    'x-data' => 'window.tallkit.component(\'alert\')',
                    'x-show.transition.opacity.out.duration.1500ms' => 'openned',
                ],

                'icon' => [
                    'class' => 'flex items-center border-2 justify-center h-10 w-10 flex-shrink-0 rounded-full mr-4',
                ],

                'dismissible' => [
                    'container' => [
                        'class' => 'absolute top-0 right-0 p-2 outline-none focus:outline-none flex items-center hover:opacity-75',
                        'type' => 'button',
                        '@click' => 'close',
                    ],

                    'icon' => [
                        'class' => 'flex items-center justify-center h-8 w-8 flex-shrink-0 rounded-full',
                    ],

                    'iconSvg' => '<svg fill="currentColor" viewBox="0 0 20 20" class="h-4 w-4 text-gray-700"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',

                    'iconName' => 'close',

                    'text' => [
                        'class' => 'text-sm text-gray-700',
                    ],
                ],

                'title' => [
                    'class' => 'font-semibold text-lg',
                ],

                'message' => [
                    'class' => 'text-sm',
                ],

                'types' => [
                    'default' => [
                        'color' => 'gray',
                        'iconSvg' => false,
                        'iconName' => false,
                        'title' => false,
                    ],

                    'error' => [
                        'color' => 'red',
                        'iconSvg' => '<svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',
                        'iconName' => 'close',
                        'title' => 'Error',
                    ],

                    'info' => [
                        'color' => 'blue',
                        'iconSvg' => '<svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>',
                        'iconName' => 'information',
                        'title' => 'Info',
                    ],

                    'success' => [
                        'color' => 'green',
                        'iconSvg' => '<svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>',
                        'iconName' => 'check',
                        'title' => 'Success',
                    ],

                    'warning' => [
                        'color' => 'yellow',
                        'iconSvg' => '<svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>',
                        'iconName' => 'alert',
                        'title' => 'Warning',
                    ],
                ],

                'modes' => [
                    'default' => [
                        'class' => 'border-2',
                    ],

                    'top' => [
                        'class' => 'border-t-2',
                    ],

                    'bottom' => [
                        'class' => 'border-b-2',
                    ],

                    'left' => [
                        'class' => 'border-l-2',
                    ],

                    'right' => [
                        'class' => 'border-r-2',
                    ],

                    'banner' => [
                        'class' => 'border-t-2 border-b-2',
                    ],

                    'outlined' => [
                        'class' => 'border-2 bg-transparent',
                    ],
                ],

                'rounded' => [
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
                ],

                'shadow' => [
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
            ],

            /**
             * Buttons.
             */
            'button' => [
                'container' => [
                    'class' => 'flex-inline items-center justify-between font-bold py-2 px-4 focus:outline-none focus:shadow-outline',
                ],

                'colors' => [
                    'default' => [
                        'name' => 'gray',
                        'weight' => 500,
                        'hover' => 700,
                    ],

                    'info' => [
                        'name' => 'blue',
                        'weight' => 500,
                        'hover' => 700,
                    ],

                    'error' => [
                        'name' => 'red',
                        'weight' => 500,
                        'hover' => 700,
                    ],

                    'success' => [
                        'name' => 'green',
                        'weight' => 500,
                        'hover' => 700,
                    ],

                    'warning' => [
                        'name' => 'yellow',
                        'weight' => 500,
                        'hover' => 700,
                    ],
                ],

                'rounded' => [
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

                'shadow' => [
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
            ],

            'form-button' => [
                'container' => [],

                'button' => [],
            ],

            'logout' => [
                'button' => [],
            ],

            /**
             * Editors.
             */
            'easymde' => [
                'easymde' => [
                    'data-tallkit-assets' => 'alpine,easymde',
                    'x-data' => 'window.tallkit.component(\'easymde\')',
                ],
            ],

            'quill' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,quill',
                    'wire:ignore' => 'true',
                    'x-data' => 'window.tallkit.component(\'quill\')',
                ],

                'input' => [
                    'x-ref' => 'input',
                ],

                'quill' => [
                    'class' => 'quill-container',
                    'x-ref' => 'editor',
                ],
            ],

            'trix' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,trix',
                    'wire:ignore' => 'true',
                    'x-data' => 'window.tallkit.component(\'trix\')',
                    'x-init' => 'init',
                    'x-on:trix-change' => 'change',
                ],

                'input' => [],

                'trix' => [
                    'class' => 'trix-content block w-full border-gray-200 rounded shadow',
                ],
            ],

            /**
             * Forms.
             */
            'checkbox' => [
                'container' => [
                    'class' => 'flex flex-col',
                ],

                'label' => [
                    'class' => 'flex items-center',
                ],

                'labelText' => [
                    'class' => 'ml-3',
                ],

                'checkbox' => [
                    'class' => 'h-4 w-4 border-gray-200 rounded shadow',
                ],
            ],

            'errors' => [
                'container' => [
                    'class' => 'text-red-600 text-sm italic',
                ],
            ],

            'field' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'labelText' => [
                    'class' => 'mb-1',
                ],

                'errors' => [],
            ],

            'form' => [
                'container' => [],
            ],

            'group' => [
                'labelText' => [
                    'class' => 'mb-1',
                ],

                'types' => [
                    'grid' => [
                        'class' => 'grid gap-6',
                    ],

                    'inline' => [
                        'class' => 'flex flex-wrap space-x-6',
                    ],

                    'block' => [],
                ],
            ],

            'input' => [
                'hidden' => [
                    'class' => 'hidden',
                ],

                'input' => [
                    'class' => 'block w-full py-2 px-3 border border-gray-200 bg-white rounded shadow sm:text-sm',
                ],
            ],

            'label' => [
                'container' => [
                    'class' => 'block text-sm font-medium text-gray-700',
                ],
            ],

            'radio' => [
                'label' => [
                    'class' => 'inline-flex items-center',
                ],

                'labelText' => [
                    'class' => 'ml-3',
                ],

                'radio' => [
                    'class' => 'h-4 w-4 border-gray-200 shadow',
                ],
            ],

            'select' => [
                'multiselect' => [
                    'class' => 'block w-full py-2 px-3 border border-gray-200 bg-white rounded shadow sm:text-sm',
                ],

                'select' => [
                    'class' => 'block w-full py-2 px-3 border border-gray-200 bg-white rounded shadow sm:text-sm',
                ],
            ],

            'textarea' => [
                'textarea' => [
                    'class' => 'block w-full py-2 px-3 border border-gray-200 bg-white rounded shadow sm:text-sm',
                ],
            ],

            'validation-errors' => [
                'alert' => [
                    'class' => 'mb-4',
                ],

                'container' => [
                    'class' => 'mb-4',
                ],

                'title' => [
                    'class' => 'font-medium text-red-600',
                ],

                'ul' => [
                    'class' => 'mt-3 list-disc list-inside text-sm text-red-600',
                ],

                'li' => [],
            ],

            /**
             * Layouts.
             */
            'authentication-card' => [
                'container' => [
                    'class' => 'min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100',
                ],

                'logo' => [],

                'card' => [
                    'class' => 'w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow overflow-hidden rounded',
                ],
            ],

            'card' => [
                'container' => [
                    'class' => 'bg-white shadow rounded overflow-hidden',
                ],

                'header' => [
                    'class' => 'px-8 py-4 bg-gray-50',
                ],

                'content' => [
                    'class' => 'p-8 text-gray-700',
                ],

                'footer' => [
                    'class' => 'px-8 py-4 bg-gray-50',
                ],
            ],

            'form-section' => [
                'container' => [
                    'class' => 'md:grid md:grid-cols-3 md:gap-6',
                ],

                'section' => [
                    'class' => 'md:col-span-1',
                ],

                'title' => [
                    'class' => 'px-4 sm:px-0',
                ],

                'form' => [
                    'class' => 'mt-5 md:mt-0 md:col-span-2',
                ],
            ],

            'html' => [
                'html' => [],

                'head' => [],

                'body' => [],
            ],

            'section' => [
                'container' => [
                    'class' => 'flex justify-between',
                ],

                'content' => [],

                'title' => [
                    'class' => 'text-lg font-medium text-gray-900',
                ],

                'subtitle' => [
                    'class' => 'text-sm text-gray-500',
                ],

                'actions' => [],
            ],

            'social-meta' => [],

            /**
             * Modals.
             */
            'modal' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-data' => 'window.tallkit.component(\'modal\')',
                ],

                'trigger' => [
                    'class' => 'inline cursor-pointer',
                    '@click' => 'toggle',
                ],

                'box' => [
                    '@close.stop' => 'close',
                    '@keydown.escape.window' => 'close',
                    '@keydown.tab.prevent' => '$event.shiftKey || nextFocusable().focus()',
                    '@keydown.shift.tab.prevent' => 'prevFocusable().focus()',
                    'x-show' => 'openned',
                    'class' => 'fixed p-6 inset-0 px-4 z-50 flex justify-center',
                    'style' => 'display: none;',
                ],

                'aligns' => [
                    'top' => [
                        'class' => 'items-start',
                    ],

                    'center' => [
                        'class' => 'items-center',
                    ],

                    'bottom' => [
                        'class' => 'items-end',
                    ],
                ],

                'overlay' => [
                    'x-show' => 'openned',
                    'class' => 'fixed inset-0 transform transition-all',
                    '@click' => 'close',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:enter-start' => 'opacity-0',
                    'x-transition:enter-end' => 'opacity-100',
                    'x-transition:leave' => 'ease-in duration-200',
                    'x-transition:leave-start' => 'opacity-100',
                    'x-transition:leave-end' => 'opacity-0',
                ],

                'backdrop' => [
                    'class' => 'absolute inset-0 bg-gray-500 opacity-75',
                ],

                'modal' => [
                    'x-show' => 'openned',
                    'class' => 'flex-initial bg-white rounded overflow-hidden shadow transform transition-all w-full',
                ],

                'transitions' => [
                    'top' => [
                        'x-transition:enter' => 'ease-out duration-300',
                        'x-transition:enter-start' => 'opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95',
                        'x-transition:enter-end' => 'opacity-100 translate-y-0 sm:scale-100',
                        'x-transition:leave' => 'ease-in duration-200',
                        'x-transition:leave-start' => 'opacity-100 translate-y-0 sm:scale-100',
                        'x-transition:leave-end' => 'opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95',
                    ],

                    'center' => [
                        'x-transition:enter' => 'ease-out duration-300',
                        'x-transition:enter-start' => 'opacity-0 sm:scale-95',
                        'x-transition:enter-end' => 'opacity-100 sm:scale-100',
                        'x-transition:leave' => 'ease-in duration-200',
                        'x-transition:leave-start' => 'opacity-100 sm:scale-100',
                        'x-transition:leave-end' => 'opacity-0 sm:scale-95',
                    ],

                    'bottom' => [
                        'x-transition:enter' => 'ease-out duration-300',
                        'x-transition:enter-start' => 'opacity-0 -translate-y-4 sm:translate-y-0 sm:scale-95',
                        'x-transition:enter-end' => 'opacity-100 translate-y-0 sm:scale-100',
                        'x-transition:leave' => 'ease-in duration-200',
                        'x-transition:leave-start' => 'opacity-100 translate-y-0 sm:scale-100',
                        'x-transition:leave-end' => 'opacity-0 -translate-y-4 sm:translate-y-0 sm:scale-95',
                    ],
                ],
            ],

            /**
             * Navigations.
             */
            'dropdown' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'class' => 'relative inline',
                    'x-data' => 'window.tallkit.component(\'dropdown\')',
                ],

                'trigger' => [
                    'class' => 'inline cursor-pointer',
                    '@click' => 'toggle',
                ],

                'overlay' => [
                    'x-show' => 'openned',
                    'class' => 'fixed inset-0 transform transition-all',
                    '@click' => 'close',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:enter-start' => 'opacity-0',
                    'x-transition:enter-end' => 'opacity-100',
                    'x-transition:leave' => 'ease-in duration-200',
                    'x-transition:leave-start' => 'opacity-100',
                    'x-transition:leave-end' => 'opacity-0',
                ],

                'backdrop' => [
                    'class' => 'absolute inset-0 bg-gray-500 opacity-75',
                ],

                'dropdown' => [
                    'x-transition:enter' => 'transition ease-out duration-200',
                    'x-transition:enter-start' => 'transform opacity-0 scale-95',
                    'x-transition:enter-end' => 'transform opacity-100 scale-100',
                    'x-transition:leave' => 'transition ease-in duration-75',
                    'x-transition:leave-start' => 'transform opacity-100 scale-100',
                    'x-transition:leave-end' => 'transform opacity-0 scale-95',
                    'class' => 'absolute z-10',
                    'x-show' => 'openned',
                    '@click' => 'close',
                    '@click.away' => 'close',
                    'style' => 'display: none;',
                ],

                'aligns' => [
                    'top-left' => [
                        'class' => 'origin-top-left top-6 left-0',
                    ],

                    'top-right' => [
                        'class' => 'origin-top-right top-6 right-0',
                    ],

                    'bottom-left' => [
                        'class' => 'origin-bottom-left bottom-6 left-0',
                    ],

                    'bottom-right' => [
                        'class' => 'origin-bottom-right bottom-6 right-0',
                    ],
                ],
            ],

            'menu' => [
                'container' => [
                    'class' => 'bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 rounded shadow overflow-hidden',
                    'role' => 'menu',
                ],

                'inline' => [
                    'class' => 'flex items-center justify-center divide-y-0 divide-x',
                ],
            ],

            'menu-item' => [
                'container' => [],

                'link' => [
                    'class' => 'w-full flex items-center py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900',
                    'role' => 'menuitem',
                ],

                'button' => [
                    'class' => 'w-full flex items-center py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 outline-none focus:outline-none',
                    'role' => 'menuitem',
                ],

                'iconLeft' => [
                    'class' => 'mr-3',
                ],

                'iconRight' => [
                    'class' => 'ml-3',
                ],
            ],

            /**
             * Pickers.
             */
            'flatpickr' => [
                'flatpickr' => [
                    'data-tallkit-assets' => 'alpine,flatpickr',
                    'x-data' => 'window.tallkit.component(\'flatpickr\')',
                    'autocomplete' => 'off',
                ],
            ],

            'pickr' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,pickr',
                    'wire:ignore' => 'true',
                    'x-data' => 'window.tallkit.component(\'pickr\')',
                ],

                'input' => [
                    'x-ref' => 'input',
                ],

                'pickr' => [
                    'x-ref' => 'picker',
                ],
            ],

            'pikaday' => [
                'pikaday' => [
                    'data-tallkit-assets' => 'alpine,moment,pikaday',
                    'x-data' => 'window.tallkit.component(\'pikaday\')',
                    'autocomplete' => 'off',
                ],
            ],

            /**
             * Tables.
             */
            'cell' => [
                'td' => [
                    'class' => 'px-6 py-4 whitespace-nowrap text-sm text-gray-500',
                ],
            ],

            'heading' => [
                'th' => [
                    'class' => 'px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider',
                    'scope' => 'col',
                ],

                'container' => [
                    'class' => 'flex items-center',
                ],

                'sortable' => [
                    'asc' => '<svg class="asc fill-current w-4 h-4 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z" /></svg>',
                    'desc' => '<svg class="desc fill-current w-4 h-4 text-gray-500" viewBox="0 0 24 24"><path fill="currentColor" d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>',
                ],
            ],

            'row' => [
                'tr' => [],
            ],

            'table' => [
                'container' => [
                    'class' => 'shadow rounded overflow-hidden border-b border-gray-200',
                ],

                'table' => [
                    'class' => 'min-w-full divide-y divide-gray-200',
                ],

                'thead' => [],

                'tbody' => [
                    'class' => 'bg-white divide-y divide-gray-200',
                ],

                'tfoot' => [],

                'emptyText' => [
                    'class' => 'px-6 py-4 whitespace-nowrap text-lg text-gray-500 text-center',
                ],
            ],
        ],
    ],
];
