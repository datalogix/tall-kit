<?php

$lang = str_replace('_', '-', app()->getLocale());
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
        | Load type
        |--------------------------------------------------------------------------
        |
        | Supported:
        |
        | data-tallkit-assets: Load only used assets, using the 'data-tallkit-assets' attribute.
        | true: Load all assets on 'options.assets'.
        | false: Disable load assets, you need to inject manually.
        |
        */

        'load_type' => 'data-tallkit-assets',

        /*
        |--------------------------------------------------------------------------
        | inject
        |--------------------------------------------------------------------------
        |
        | Some assets are essential for the package to work,
        | with this option you can inject them automatically or not.
        |
        */
        'inject' => [

            /*
            |
            | Enable when you want to inject tailwindcss directly from the CDN,
            | the url is in `assets.tailwindcss`.
            | This option is disabled for several reasons.
            | See https://tailwindcss.com/docs/installation#using-tailwind-via-cdn
            |
            */

            'tailwindcss' => false,

            /*
            |
            | Inject alpinejs directly from the CDN, the url is in `assets.alpine`.
            | See https://github.com/alpinejs/alpine/tree/2.x#install
            |
            */

            'alpine' => true,
        ],
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
            //'https://cdn.jsdelivr.net/npm/alpinejs@2/dist/alpine.min.js',
            'https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js',
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
         * Bars.
         */
        'navbar' => \TALLKit\Components\Bars\Navbar::class,
        'sidebar' => \TALLKit\Components\Bars\Sidebar::class,
        'toolbar' => \TALLKit\Components\Bars\Toolbar::class,

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
        'toggler' => \TALLKit\Components\Buttons\Toggler::class,

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
        'field-group' => \TALLKit\Components\Forms\FieldGroup::class,
        'field' => \TALLKit\Components\Forms\Field::class, // alias
        'form-field' => \TALLKit\Components\Forms\Field::class,
        'form' => \TALLKit\Components\Forms\Form::class,
        'group' => \TALLKit\Components\Forms\Group::class,
        'form-group' => \TALLKit\Components\Forms\Group::class, // alias
        'input' => \TALLKit\Components\Forms\Input::class,
        'label' => \TALLKit\Components\Forms\Label::class,
        'lbl' => \TALLKit\Components\Forms\Label::class, // alias
        'radio' => \TALLKit\Components\Forms\Radio::class,
        'select' => \TALLKit\Components\Forms\Select::class,
        'submit' => \TALLKit\Components\Forms\Submit::class,
        'textarea' => \TALLKit\Components\Forms\Textarea::class,
        'validation-bag' => \TALLKit\Components\Forms\ValidationErrors::class, // alias
        'validation-errors' => \TALLKit\Components\Forms\ValidationErrors::class,
        'validation-error' => \TALLKit\Components\Forms\ValidationErrors::class, // alias
        'validation' => \TALLKit\Components\Forms\ValidationErrors::class, // alias

        /**
         * Icons.
         */
        'icon' => \TALLKit\Components\Icons\Icon::class,

        /**
         * Layouts.
         */
        'admin-panel' => \TALLKit\Components\Layouts\AdminPanel::class,
        'admin' => \TALLKit\Components\Layouts\AdminPanel::class, //alias
        'admin-card' => \TALLKit\Components\Layouts\AdminPanel::class, //alias
        'authentication-card' => \TALLKit\Components\Layouts\AuthenticationCard::class,
        'auth' => \TALLKit\Components\Layouts\AuthenticationCard::class, //alias
        'auth-card' => \TALLKit\Components\Layouts\AuthenticationCard::class, //alias
        'authentication' => \TALLKit\Components\Layouts\AuthenticationCard::class, //alias
        'card' => \TALLKit\Components\Layouts\Card::class,
        'form-section' => \TALLKit\Components\Layouts\FormSection::class,
        'html' => \TALLKit\Components\Layouts\Html::class,
        'logo' => \TALLKit\Components\Layouts\Logo::class,
        'overlay' => \TALLKit\Components\Layouts\Overlay::class,
        'backdrop' => \TALLKit\Components\Layouts\Overlay::class, //alias
        'section' => \TALLKit\Components\Layouts\Section::class,
        'social-meta' => \TALLKit\Components\Layouts\SocialMeta::class,
        'socialmeta' => \TALLKit\Components\Layouts\SocialMeta::class, //alias
        'meta' => \TALLKit\Components\Layouts\SocialMeta::class, //alias

        /**
         * Menus.
         */
        'dropdown-menu' => \TALLKit\Components\Menus\MenuDropdown::class, // alias
        'menu-dropdown' => \TALLKit\Components\Menus\MenuDropdown::class,
        'menu' => \TALLKit\Components\Menus\Menu::class,
        'menu-item' => \TALLKit\Components\Menus\MenuItem::class,
        'menu-user' => \TALLKit\Components\Menus\UserMenu::class, // alias
        'user-menu' => \TALLKit\Components\Menus\UserMenu::class,

        /**
         * Modals.
         */
        'modal' => \TALLKit\Components\Modals\Modal::class,

        /**
         * Navigations.
         */
        'drawer' => \TALLKit\Components\Navigations\Drawer::class,
        'dropdown' => \TALLKit\Components\Navigations\Dropdown::class,
        'navigation-drawer' => \TALLKit\Components\Navigations\Drawer::class, // alias
        'toggleable' => \TALLKit\Components\Navigations\Toggleable::class,

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
         * Supports.
         */
        'avatar' => \TALLKit\Components\Supports\Avatar::class,

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
                    'class' => 'flex flex-row p-5 rounded relative transition',
                    'role' => 'alert',
                    'x-data' => 'window.tallkit.component(\'alert\')',
                    'x-show' => 'openned',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:enter-start' => 'opacity-0',
                    'x-transition:enter-end' => 'opacity-100',
                    'x-transition:leave' => 'ease-in duration-200',
                    'x-transition:leave-start' => 'opacity-100',
                    'x-transition:leave-end' => 'opacity-0',
                ],

                'icon' => [
                    'class' => 'flex items-center border-2 justify-center h-10 w-10 flex-shrink-0 rounded-full mr-4',
                ],

                'dismissible' => [
                    'container' => [
                        'class' => 'absolute top-0 right-0 p-2 outline-none focus:outline-none flex items-center transition hover:opacity-75',
                        'type' => 'button',
                        '@click' => 'close',
                    ],

                    'icon' => [
                        'class' => 'flex items-center justify-center h-8 w-8 flex-shrink-0 rounded-full',
                    ],

                    'iconName' => 'close',

                    'iconSvg' => '<svg class="fill-current w-4 h-4" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',

                    'text' => [
                        'class' => 'text-sm text-gray-700',
                    ],
                ],

                'title' => [
                    'class' => 'font-semibold text-lg',
                ],

                'message' => [],

                'types' => [
                    'default' => [
                        'color' => 'gray',
                        'iconSvg' => false,
                        'iconName' => false,
                        'title' => false,
                    ],

                    'error' => [
                        'color' => 'red',
                        'iconName' => 'close',
                        'iconSvg' => '<svg class="fill-current h-6 w-6" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',
                        'title' => 'Error',
                    ],

                    'info' => [
                        'color' => 'blue',
                        'iconName' => 'information',
                        'iconSvg' => '<svg class="fill-current h-6 w-6" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>',
                        'title' => 'Info',
                    ],

                    'success' => [
                        'color' => 'green',
                        'iconName' => 'check',
                        'iconSvg' => '<svg class="fill-current h-6 w-6" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>',
                        'title' => 'Success',
                    ],

                    'warning' => [
                        'color' => 'yellow',
                        'iconName' => 'alert',
                        'iconSvg' => '<svg class="fill-current h-6 w-6" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>',
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
             * Bars.
             */
            'navbar' => [
                'container' => [
                    'class' => 'bg-gray-700 overflow-y-auto',
                ],

                'inline' => [
                    'class' => 'bg-gray-700 flex items-center overflow-x-auto',
                ],

                'menu' => [],

                'item' => [
                    'class' => 'text-gray-100 w-full flex items-center py-4 px-6 transition hover:bg-black hover:bg-opacity-10 outline-none focus:outline-none focus:shadow-outline',
                ],

                'active' => [
                    'class' => 'bg-black bg-opacity-25 hover:bg-opacity-25',
                ],
            ],

            'sidebar' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-data' => 'window.tallkit.component(\'sidebar\')',
                    'x-spread' => 'events',
                    'x-bind' => 'events',
                ],

                'navbar' => [
                    'class' => 'h-full relative',
                ],
            ],

            'toolbar' => [
                'container' => [
                    'class' => 'flex justify-between items-center py-4 px-6 bg-white border-b-4 border-indigo-700 text-gray-700',
                ],

                'title' => [
                    'class' => 'flex-1 text-2xl text-red-5001 font-medium',
                ],
            ],

            /**
             * Buttons.
             */
            'button' => [
                'container' => [
                    'class' => 'flex-inline items-center justify-between space-x-2 font-bold py-2 px-4 outline-none focus:outline-none focus:shadow-outline',
                ],

                'iconLeft' => [],

                'iconRight' => [],

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

            'toggler' => [
                'button' => [],

                'icon' => [
                    'class' => 'w-6 h-6',
                ],

                'iconName' => 'menu',

                'iconSvg' => [
                    '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
                ],
            ],

            /**
             * Editors.
             */
            'easymde' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,easymde',
                    'wire:ignore' => 'true',
                    'x-data' => 'window.tallkit.component(\'easymde\')',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'labelText' => [
                    'class' => 'mb-1',
                ],

                'easymde' => [
                    'x-ref' => 'editor',
                ],

                'options' => [
                    'forceSync' => true,
                ],
            ],

            'quill' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,quill',
                    'wire:ignore' => 'true',
                    'x-data' => 'window.tallkit.component(\'quill\')',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'labelText' => [
                    'class' => 'mb-1',
                ],

                'input' => [
                    'x-ref' => 'input',
                ],

                'quill' => [
                    'class' => 'quill-container',
                    'x-ref' => 'editor',
                ],

                'options' => [
                    'theme' => 'snow',
                ],
            ],

            'trix' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,trix',
                    'wire:ignore' => 'true',
                    'x-data' => 'window.tallkit.component(\'trix\')',
                    'x-init' => 'setup',
                    'x-on:trix-change' => 'change',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'labelText' => [
                    'class' => 'mb-1',
                ],

                'input' => [],

                'trix' => [
                    'class' => 'trix-content block w-full border-gray-200 rounded shadow bg-white',
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

            'field-group' => [
                'container' => [
                    'class' => 'flex divide-x items-center border border-gray-200 bg-white rounded shadow overflow-hidden focus-within:ring',
                ],

                'field' => [
                    'class' => 'flex-1 w-full',
                ],

                'prepend' => [
                    'class' => 'py-2 px-3',
                ],

                'append' => [
                    'class' => 'p-2 px-3',
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
                    'block' => [],

                    'inline' => [
                        'class' => 'flex flex-wrap space-x-6',
                    ],

                    'grid-1' => [
                        'class' => 'grid gap-6 grid-cols-1',
                    ],

                    'grid-2' => [
                        'class' => 'grid gap-6 grid-cols-2',
                    ],

                    'grid-3' => [
                        'class' => 'grid gap-6 grid-cols-3',
                    ],

                    'grid-4' => [
                        'class' => 'grid gap-6 grid-cols-4',
                    ],

                    'grid-5' => [
                        'class' => 'grid gap-6 grid-cols-5',
                    ],

                    'grid-6' => [
                        'class' => 'grid gap-6 grid-cols-6',
                    ],

                    'grid-7' => [
                        'class' => 'grid gap-6 grid-cols-7',
                    ],

                    'grid-8' => [
                        'class' => 'grid gap-6 grid-cols-8',
                    ],

                    'grid-9' => [
                        'class' => 'grid gap-6 grid-cols-9',
                    ],

                    'grid-10' => [
                        'class' => 'grid gap-6 grid-cols-10',
                    ],

                    'grid-11' => [
                        'class' => 'grid gap-6 grid-cols-11',
                    ],

                    'grid-12' => [
                        'class' => 'grid gap-6 grid-cols-12',
                    ],
                ],
            ],

            'input' => [
                'hidden' => [
                    'class' => 'hidden',
                ],

                'input' => [
                    'class' => 'block w-full py-2 px-3 outline-none focus:outline-none',
                ],

                'mask' => [
                    'data-tallkit-assets' => 'alpine,imask',
                    'x-data' => 'window.tallkit.component(\'mask\')',
                    'x-ref' => 'input',
                ],
            ],

            'label' => [
                'container' => [
                    'class' => 'block text-gray-700',
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
                    'class' => 'block w-full py-2 px-3 outline-none focus:outline-none',
                ],

                'select' => [
                    'class' => 'block w-full py-2 px-3 outline-none focus:outline-none',
                ],
            ],

            'textarea' => [
                'textarea' => [
                    'class' => 'block w-full py-2 px-3 outline-none focus:outline-none',
                    'rows' => '5',
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
            'admin-panel' => [
                'container' => [
                    'class' => 'flex h-screen bg-gray-100',
                ],

                'sidebar' => [],

                'logo' => [
                    'class' => 'text-white',
                ],

                'box' => [
                    'class' => 'flex-1 flex flex-col overflow-hidden',
                ],

                'toolbar' => [],

                'toggler' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-data' => '',
                ],

                'main' => [
                    'class' => 'flex-1 overflow-auto bg-transparent',
                ],

                'content' => [
                    'class' => 'container mx-auto px-6 py-8',
                ],
            ],

            'authentication-card' => [
                'container' => [
                    'class' => 'min-h-screen flex flex-col items-center pt-6 bg-gray-100',
                ],

                'header' => [],

                'logo' => [],

                'card' => [
                    'class' => 'w-full sm:max-w-md px-6 py-4 bg-white shadow overflow-hidden rounded',
                ],
            ],

            'card' => [
                'container' => [
                    'class' => 'bg-white shadow rounded relative',
                ],

                'link' => [
                    'class' => 'block transition hover:shadow-lg',
                ],

                'image-header' => [
                    'class' => 'w-full h-32 rounded-t',
                ],

                'header' => [
                    'class' => 'px-8 py-4 bg-gray-50 overflow-hidden',
                ],

                'content' => [
                    'class' => 'block p-8',
                ],

                'title' => [
                    'class' => 'block mb-1 text-lg font-medium text-gray-900',
                ],

                'text' => [
                    'class' => 'text-gray-700',
                ],

                'footer' => [
                    'class' => 'px-8 py-4 bg-gray-50 overflow-hidden',
                ],

                'image-footer' => [
                    'class' => 'w-full h-32 rounded-b',
                ],
            ],

            'form-section' => [
                'container' => [
                    'class' => 'lg:grid lg:grid-cols-3 lg:gap-6',
                ],

                'section' => [
                    'class' => 'lg:col-span-1',
                ],

                'title' => [],

                'form' => [
                    'class' => 'mt-5 lg:mt-0 lg:col-span-2',
                ],

                'card' => [],
            ],

            'html' => [
                'html' => [
                    'lang' => $lang,
                ],

                'head' => [],

                'body' => [],
            ],

            'logo' => [
                'container' => [
                    'class' => 'flex items-center justify-center p-4 m-4',
                ],

                'image' => [
                    'class' => 'mx-auto',
                ],

                'name' => [
                    'class' => 'text-2xl font-semibold',
                ],
            ],

            'overlay' => [
                'container' => [
                    'class' => 'fixed inset-0 transform transition cursor-pointer',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:enter-start' => 'opacity-0',
                    'x-transition:enter-end' => 'opacity-100',
                    'x-transition:leave' => 'ease-in duration-200',
                    'x-transition:leave-start' => 'opacity-100',
                    'x-transition:leave-end' => 'opacity-0',
                    'x-show' => 'openned',
                    '@click' => 'close(false)',
                ],

                'backdrop' => [
                    'class' => 'absolute inset-0 bg-gray-500 opacity-75',
                ],
            ],

            'section' => [
                'container' => [
                    'class' => 'flex justify-between items-center',
                ],

                'content' => [],

                'header' => [],

                'title' => [
                    'class' => 'text-lg font-medium text-gray-900',
                ],

                'subtitle' => [
                    'class' => 'text-gray-500',
                ],

                'actions' => [],
            ],

            'social-meta' => [],

            /**
             * Menus.
             */
            'menu-dropdown' => [
                'container' => [],

                'aligns' => [
                    'top' => [
                        'class' => 'top-0',
                    ],

                    'left' => [
                        'class' => 'left-0',
                    ],

                    'right' => [
                        'class' => 'right-0',
                    ],

                    'bottom' => [
                        'class' => 'bottom-0',
                    ],

                    'top-left' => [
                        'class' => 'top-0 left-0',
                    ],

                    'top-right' => [
                        'class' => 'top-0 right-0',
                    ],

                    'bottom-left' => [
                        'class' => 'bottom-0 left-0',
                    ],

                    'bottom-right' => [
                        'class' => 'bottom-0 right-0',
                    ],
                ],

                'dropdown' => [],

                'trigger' => [
                    'type' => 'button',
                    'class' => 'bg-white text-gray-700 shadow rounded-full w-8 h-8 transition hover:bg-gray-100 flex items-center justify-center outline-none focus:outline-none',
                ],

                'icon' => [],

                'iconName' => 'ellipsis-v',

                'iconSvg' => '<svg class="fill-current w-4 h-4" viewBox="0 0 192 512"><path d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z"/></svg>',
            ],

            'menu' => [
                'container' => [
                    'class' => 'bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 rounded shadow overflow-hidden whitespace-nowrap',
                    'role' => 'menu',
                ],

                'inline' => [
                    'class' => 'flex items-center justify-center bg-white ring-1 ring-black ring-opacity-5 divide-x divide-gray-100 rounded shadow overflow-hidden whitespace-nowrap',
                    'role' => 'menu',
                ],
            ],

            'menu-item' => [
                'container' => [],

                'item' => [
                    'class' => 'w-full flex items-center py-2 px-4 text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 outline-none focus:outline-none focus:shadow-outline',
                    'role' => 'menuitem',
                ],

                'active' => [
                    'class' => 'bg-gray-100 text-gray-900',
                ],

                'iconLeft' => [
                    'class' => 'mr-3',
                ],

                'iconRight' => [
                    'class' => 'ml-3',
                ],
            ],

            'user-menu' => [
                'container' => [],

                'user' => [
                    'class' => 'flex items-center space-x-2',
                ],

                'userAvatar' => [
                    'class' => 'w-8 h-8 rounded-full overflow-hidden border shadow bg-indigo-700 text-white flex items-center justify-center font-bold',
                ],

                'userAvatarContainer' => [
                    'theme:image' => 'w-full h-full',
                    'theme:icon' => 'w-4 h-4',
                ],

                'userName' => [],
            ],

            /**
             * Modals.
             */
            'modal' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'modal\')',
                ],

                'trigger' => [
                    'class' => 'inline cursor-pointer',
                    '@click' => 'toggle',
                ],

                'box' => [
                    'class' => 'fixed p-6 inset-0 px-4 z-50 flex justify-center',
                    'x-show' => 'openned',
                    '@close.stop' => 'close',
                    '@keydown.escape.window' => 'close',
                    '@keydown.tab.prevent' => '$event.shiftKey || nextFocusable().focus()',
                    '@keydown.shift.tab.prevent' => 'prevFocusable().focus()',
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

                'modal' => [
                    'class' => 'flex-initial bg-white rounded overflow-hidden shadow transform transition w-full',
                    'x-show' => 'openned',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:leave' => 'ease-in duration-200',
                ],

                'transitions' => [
                    'top' => [
                        'x-transition:enter-start' => 'opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95',
                        'x-transition:enter-end' => 'opacity-100 translate-y-0 sm:scale-100',
                        'x-transition:leave-start' => 'opacity-100 translate-y-0 sm:scale-100',
                        'x-transition:leave-end' => 'opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95',
                    ],

                    'center' => [
                        'x-transition:enter-start' => 'opacity-0 sm:scale-95',
                        'x-transition:enter-end' => 'opacity-100 sm:scale-100',
                        'x-transition:leave-start' => 'opacity-100 sm:scale-100',
                        'x-transition:leave-end' => 'opacity-0 sm:scale-95',
                    ],

                    'bottom' => [
                        'x-transition:enter-start' => 'opacity-0 -translate-y-4 sm:translate-y-0 sm:scale-95',
                        'x-transition:enter-end' => 'opacity-100 translate-y-0 sm:scale-100',
                        'x-transition:leave-start' => 'opacity-100 translate-y-0 sm:scale-100',
                        'x-transition:leave-end' => 'opacity-0 -translate-y-4 sm:translate-y-0 sm:scale-95',
                    ],
                ],
            ],

            /**
             * Navigations.
             */
            'drawer' => [
                'container' => [],

                'drawer' => [
                    'class' => 'fixed transform transition',
                    'x-show' => 'openned',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:leave' => 'ease-in duration-200',
                ],

                'aligns' => [
                    'left' => [
                        'class' => 'h-full top-0 bottom-0 left-0 overflow-y-auto',
                        'x-transition:enter-start' => '-translate-x-full',
                        'x-transition:enter-end' => 'translate-x-0',
                        'x-transition:leave-start' => 'translate-x-0',
                        'x-transition:leave-end' => '-translate-x-full',
                    ],

                    'right' => [
                        'class' => 'h-full top-0 bottom-0 right-0 overflow-y-auto',
                        'x-transition:enter-start' => 'translate-x-full',
                        'x-transition:enter-end' => 'translate-x-0',
                        'x-transition:leave-start' => 'translate-x-0',
                        'x-transition:leave-end' => 'translate-x-full',
                    ],

                    'top' => [
                        'class' => 'w-full top-0 left-0 right-0 overflow-x-auto',
                        'x-transition:enter-start' => '-translate-y-full',
                        'x-transition:enter-end' => 'translate-y-0',
                        'x-transition:leave-start' => 'translate-y-0',
                        'x-transition:leave-end' => '-translate-y-full',
                    ],

                    'bottom' => [
                        'class' => 'w-full bottom-0 left-0 right-0 overflow-x-auto',
                        'x-transition:enter-start' => 'translate-y-full',
                        'x-transition:enter-end' => 'translate-y-0',
                        'x-transition:leave-start' => 'translate-y-0',
                        'x-transition:leave-end' => 'translate-y-full',
                    ],
                ],
            ],

            'dropdown' => [
                'trigger' => [
                    'class' => 'inline cursor-pointer',
                    '@click' => 'toggle',
                ],

                'dropdown' => [
                    'class' => 'absolute',
                    'x-show' => 'openned',
                    'x-transition:enter' => 'transition ease-out duration-300',
                    'x-transition:enter-start' => 'transform opacity-0 scale-95',
                    'x-transition:enter-end' => 'transform opacity-100 scale-100',
                    'x-transition:leave' => 'transition ease-in duration-200',
                    'x-transition:leave-start' => 'transform opacity-100 scale-100',
                    'x-transition:leave-end' => 'transform opacity-0 scale-95',
                    '@click' => 'close',
                    '@click.away' => 'close',
                ],

                'aligns' => [
                    'top' => [
                        'class' => 'top-0',
                    ],

                    'left' => [
                        'class' => 'left-0',
                    ],

                    'right' => [
                        'class' => 'right-0',
                    ],

                    'bottom' => [
                        'class' => 'bottom-0',
                    ],

                    'top-left' => [
                        'class' => 'origin-top-left top-0 left-0',
                    ],

                    'top-right' => [
                        'class' => 'origin-top-right top-0 right-0',
                    ],

                    'bottom-left' => [
                        'class' => 'origin-bottom-left bottom-0 left-0',
                    ],

                    'bottom-right' => [
                        'class' => 'origin-bottom-right bottom-0 right-0',
                    ],
                ],
            ],

            'toggleable' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'class' => 'relative',
                    ':class' => '{\'z-30\': openned}',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'toggleable\')',
                ],
            ],

            /**
             * Pickers.
             */
            'flatpickr' => [
                'flatpickr' => [
                    'data-tallkit-assets' => 'alpine,flatpickr',
                    'x-data' => 'window.tallkit.component(\'flatpickr\')',
                    'x-ref' => 'input',
                    'autocomplete' => 'off',
                ],

                'options' => [
                    'enableTime' => true,
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

                'options' => [
                    'theme' => 'classic',

                    'swatches' => [
                        '000000',
                        'A0AEC0',
                        'F56565',
                        'ED8936',
                        'ECC94B',
                        '48BB78',
                        '38B2AC',
                        '4299E1',
                        '667EEA',
                        '9F7AEA',
                        'ED64A6',
                        'FFFFFF',
                    ],

                    'components' => [
                        'preview' => true,
                        'interaction' => [
                            'hex' => true,
                            'input' => true,
                            'clear' => true,
                            'save' => true,
                        ],
                    ],
                ],
            ],

            'pikaday' => [
                'pikaday' => [
                    'data-tallkit-assets' => 'alpine,moment,pikaday',
                    'x-data' => 'window.tallkit.component(\'pikaday\')',
                    'x-ref' => 'input',
                    'autocomplete' => 'off',
                ],

                'options' => [],
            ],

            /**
             * Supports.
             */
            'avatar' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'avatar\')',
                    'x-init' => 'setup',
                ],

                'image' => [
                    'x-show' => 'loaded',
                    'x-ref' => 'image',
                ],

                'icon' => [
                    'x-show' => '!loaded',
                ],

                'iconName' => 'user',

                'iconSvg' => '<svg class="fill-current" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>',
            ],

            /**
             * Tables.
             */
            'cell' => [
                'td' => [
                    'class' => 'px-6 py-4 whitespace-nowrap text-gray-500',
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
                    'asc' => [
                        'iconName' => 'chevron-up',
                        'iconSvg' => '<svg class="fill-current w-4 h-4" viewBox="0 0 24 24"><path d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z" /></svg>',
                    ],

                    'desc' => [
                        'iconName' => 'chevron-down',
                        'iconSvg' => '<svg class="fill-current w-4 h-4" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>',
                    ],
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
