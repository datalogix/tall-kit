<?php

$locale = strtolower(substr(app()->getLocale(), 0, 2));

return [
    'prefix' => '',

    'components' => [
        /**
         * Alerts.
         */
        'alert' => \Datalogix\TALLKit\Components\Alerts\Alert::class,

        /**
         * Buttons.
         */
        'button' => \Datalogix\TALLKit\Components\Buttons\Button::class,
        'bt' => \Datalogix\TALLKit\Components\Buttons\Button::class, // alias
        'btn' => \Datalogix\TALLKit\Components\Buttons\Button::class, // alias
        'form-button' => \Datalogix\TALLKit\Components\Buttons\FormButton::class,
        'form-bt' => \Datalogix\TALLKit\Components\Buttons\FormButton::class, // alias
        'form-btn' => \Datalogix\TALLKit\Components\Buttons\FormButton::class, // alias
        'logout' => \Datalogix\TALLKit\Components\Buttons\Logout::class,

        /**
         * Editors.
         */
        'editor' => \Datalogix\TALLKit\Components\Editors\Quill::class, // alias
        'easy-mde' => \Datalogix\TALLKit\Components\Editors\EasyMde::class,
        'easymde' => \Datalogix\TALLKit\Components\Editors\EasyMde::class, // alias
        'mde' => \Datalogix\TALLKit\Components\Editors\EasyMde::class, // alias
        'quill' => \Datalogix\TALLKit\Components\Editors\Quill::class,
        'trix' => \Datalogix\TALLKit\Components\Editors\Trix::class,

        /**
         * Forms.
         */
        'checkbox' => \Datalogix\TALLKit\Components\Forms\Checkbox::class,
        'check' => \Datalogix\TALLKit\Components\Forms\Checkbox::class, // alias
        'errors' => \Datalogix\TALLKit\Components\Forms\Errors::class,
        'error' => \Datalogix\TALLKit\Components\Forms\Errors::class, // alias
        'form' => \Datalogix\TALLKit\Components\Forms\Form::class,
        'group' => \Datalogix\TALLKit\Components\Forms\Group::class,
        'input' => \Datalogix\TALLKit\Components\Forms\Input::class,
        'field' => \Datalogix\TALLKit\Components\Forms\Input::class, // alias
        'label' => \Datalogix\TALLKit\Components\Forms\Label::class,
        'lbl' => \Datalogix\TALLKit\Components\Forms\Label::class, // alias
        'radio' => \Datalogix\TALLKit\Components\Forms\Radio::class,
        'select' => \Datalogix\TALLKit\Components\Forms\Select::class,
        'submit' => \Datalogix\TALLKit\Components\Forms\Submit::class,
        'textarea' => \Datalogix\TALLKit\Components\Forms\Textarea::class,
        'validation-errors' => \Datalogix\TALLKit\Components\Forms\ValidationErrors::class,
        'validation' => \Datalogix\TALLKit\Components\Forms\ValidationErrors::class, // alias

        /**
         * Icons.
         */
        'icon' => \Datalogix\TALLKit\Components\Icons\Icon::class,

        /**
         * Layouts.
         */
        'auth' => \Datalogix\TALLKit\Components\Layouts\AuthenticationCard::class, //alias
        'auth-card' => \Datalogix\TALLKit\Components\Layouts\AuthenticationCard::class, //alias
        'authentication' => \Datalogix\TALLKit\Components\Layouts\AuthenticationCard::class,
        'authentication-card' => \Datalogix\TALLKit\Components\Layouts\AuthenticationCard::class, //alias
        'card' => \Datalogix\TALLKit\Components\Layouts\Card::class,
        'form-section' => \Datalogix\TALLKit\Components\Layouts\FormSection::class,
        'html' => \Datalogix\TALLKit\Components\Layouts\Html::class,
        'section' => \Datalogix\TALLKit\Components\Layouts\Section::class,
        'meta' => \Datalogix\TALLKit\Components\Layouts\SocialMeta::class, //alias
        'social-meta' => \Datalogix\TALLKit\Components\Layouts\SocialMeta::class,
        'socialmeta' => \Datalogix\TALLKit\Components\Layouts\SocialMeta::class, //alias

        /**
         * Modals.
         */
        'modal' => \Datalogix\TALLKit\Components\Modals\Modal::class,

        /**x
         * Navigations.
         */
        'dropdown' => \Datalogix\TALLKit\Components\Navigations\Dropdown::class,
        'menu' => \Datalogix\TALLKit\Components\Navigations\Menu::class,
        'menu-item' => \Datalogix\TALLKit\Components\Navigations\MenuItem::class,
        'menuitem' => \Datalogix\TALLKit\Components\Navigations\MenuItem::class,

        /**
         * Pickers.
         */
        'datetime-picker' => \Datalogix\TALLKit\Components\Pickers\Flatpickr::class, // alias
        'datetimepicker' => \Datalogix\TALLKit\Components\Pickers\Flatpickr::class, // alias
        'flatpickr' => \Datalogix\TALLKit\Components\Pickers\Flatpickr::class,

        'color-picker' => \Datalogix\TALLKit\Components\Pickers\Pickr::class, // alias
        'colorpicker' => \Datalogix\TALLKit\Components\Pickers\Pickr::class, // alias
        'pickr' => \Datalogix\TALLKit\Components\Pickers\Pickr::class,

        'date-picker' => \Datalogix\TALLKit\Components\Pickers\Pikaday::class, // alias
        'datepicker' => \Datalogix\TALLKit\Components\Pickers\Pikaday::class, // alias
        'pikaday' => \Datalogix\TALLKit\Components\Pickers\Pikaday::class,

        /**
         * Tables.
         */
        'table' => \Datalogix\TALLKit\Components\Tables\Table::class,
        'heading' => \Datalogix\TALLKit\Components\Tables\Heading::class,
        'head' => \Datalogix\TALLKit\Components\Tables\Heading::class, // alias
        'th' => \Datalogix\TALLKit\Components\Tables\Heading::class, // alias
        'row' => \Datalogix\TALLKit\Components\Tables\Row::class,
        'tr' => \Datalogix\TALLKit\Components\Tables\Row::class, // alias
        'cell' => \Datalogix\TALLKit\Components\Tables\Cell::class,
        'td' => \Datalogix\TALLKit\Components\Tables\Cell::class, // alias
    ],

    'themes' => [
        'default' => [
            /**
             * Alerts.
             */
            'alert' => [
                'container' => [
                    'class' => 'flex flex-row p-5 rounded relative mb-4',
                    'role' => 'alert',
                    'style' => 'display: none;',
                    'x-data' => '{
                        shown: false,
                        timeout: null,

                        initAlert(event, milliseconds) {
                            if (event) {
                                return this.initEvent(event, milliseconds || 3000)
                            }

                            if (milliseconds) {
                                return this.initTimeout(milliseconds)
                            }

                            this.shown = true
                        },

                        initTimeout(milliseconds) {
                            clearTimeout(this.timeout)
                            this.shown = true
                            this.timeout = setTimeout(() => { this.shown = false }, milliseconds)
                        },

                        initEvent(event, milliseconds) {
                            if (typeof Livewire === \'undefined\') {
                                console.warn(\'Livewire not found! See https://laravel-livewire.com/docs/installation\');
                                return
                            }

                            Livewire.on(event, () => {
                                this.initTimeout(milliseconds)
                            })
                        },
                    }',
                    'x-show.transition.opacity.out.duration.1500ms' => 'shown',
                ],

                'icon' => [
                    'class' => 'flex items-center border-2 justify-center h-10 w-10 flex-shrink-0 rounded-full mr-4',
                ],

                'dismissible' => [
                    'container' => [
                        'class' => 'absolute top-0 right-0 p-2 outline-none focus:outline-none flex items-center hover:opacity-75',
                        'type' => 'button',
                        '@click' => 'shown = false',
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
                    'class' => 'flex items-center justify-between',
                ],

                'button' => [
                    'class' => 'font-bold py-2 px-4 focus:outline-none focus:shadow-outline',
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
                'container' => '',

                'button' => [],
            ],

            'logout' => [
                'button' => [],
            ],

            /**
             * Editors.
             */
            'easy-mde' => [
                'easymde' => [
                    'x-data' => '{
                        initEasyMde(element, options) {
                            new EasyMDE({ element, ...options })
                        },
                    }',
                ],
            ],

            'quill' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'labelText' => '',

                'quill' => [
                    'class' => 'quill-container',
                    'x-data' => '{
                        initQuill(element, inputId, options) {
                            const quill = new Quill(element, options)
                            const input = document.getElementById(inputId)

                            if (input.value) {
                                quill.setContents(JSON.parse(input.value).ops)
                            }

                            (function () {
                                const inputEvent = new Event("input")
                                quill.on("text-change", (delta, oldDelta, source) => {
                                    input.value = JSON.stringify(quill.getContents())
                                    input.dispatchEvent(inputEvent)
                                })
                            })()
                        },
                    }',
                ],

                'errors' => '',
            ],

            'trix' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'labelText' => '',

                'trix' => [
                    'class' => 'trix-content block w-full border-gray-200 rounded shadow',
                ],

                'errors' => '',
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
                    'class' => 'ml-3 block text-sm font-medium text-gray-700',
                ],

                'checkbox' => [
                    'class' => 'h-4 w-4 border-gray-200 rounded shadow',
                ],

                'errors' => '',
            ],

            'errors' => [
                'container' => [
                    'class' => 'text-red-600 text-sm italic',
                ],
            ],

            'form' => [
                'container' => [],
            ],

            'group' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'labelText' => '',

                'inline' => [
                    'class' => 'flex flex-wrap space-x-6',
                ],

                'block' => [],

                'errors' => '',
            ],

            'input' => [
                'hidden' => [
                    'class' => 'hidden',
                ],

                'container' => [
                    'class' => 'mb-4',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'labelText' => '',

                'input' => [
                    'class' => 'block w-full sm:text-sm border-gray-200 rounded shadow',
                    'x-data' => '{
                        initMask(element, options) {
                            Inputmask(options).mask(element)
                        },
                    }',
                ],

                'errors' => '',

                'types' => [
                    /*
                    'password' => [
                        'class' => 'custom-class-per-type',
                    ],
                    */
                ],
            ],

            'label' => [
                'container' => [
                    'class' => 'block mb-1 text-sm font-medium text-gray-700',
                ],
            ],

            'radio' => [
                'container' => [],

                'label' => [
                    'class' => 'inline-flex items-center',
                ],

                'labelText' => [
                    'class' => 'ml-3 block text-sm font-medium text-gray-700',
                ],

                'radio' => [
                    'class' => 'h-4 w-4 border-gray-200 shadow',
                ],

                'errors' => '',
            ],

            'select' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'labelText' => '',

                'multiselect' => [
                    'class' => 'block w-full py-2 px-3 border border-gray-200 bg-white rounded shadow sm:text-sm',
                ],

                'select' => [
                    'class' => 'block w-full py-2 px-3 border border-gray-200 bg-white rounded shadow sm:text-sm',
                ],

                'errors' => '',
            ],

            'textarea' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'labelText' => '',

                'textarea' => [
                    'class' => 'block w-full sm:text-sm border-gray-200 rounded shadow',
                ],

                'errors' => '',
            ],

            'validation-errors' => [
                'alert' => '',

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
                    'class' => 'w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg',
                ],
            ],

            'card' => [
                'container' => [
                    'class' => 'bg-white shadow rounded overflow-hidden mb-4',
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

                'title' => 'px-4 sm:px-0',

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

                'content' => [
                    'class' => '',
                ],

                'title' => [
                    'class' => 'text-lg font-medium text-gray-900',
                ],

                'subtitle' => [
                    'class' => 'text-sm text-gray-500',
                ],

                'actions' => [
                    'class' => '',
                ],
            ],

            'social-meta' => [],

            /**
             * Modals.
             */
            'modal' => [
                'container' => [
                    'x-data' => '{
                        show: false,
                        focusables() {
                            // All focusable element types...
                            let selector = \'a, button, input, textarea, select, details, [tabindex]:not([tabindex=-1])\'

                            return [...$el.querySelectorAll(selector)]
                                // All non-disabled elements...
                                .filter(el => ! el.hasAttribute(\'disabled\'))
                        },
                        firstFocusable() { return this.focusables()[0] },
                        lastFocusable() { return this.focusables().slice(-1)[0] },
                        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
                        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
                        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
                        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
                    }',
                    '@close.stop' => 'show = false',
                    '@keydown.escape.window' => 'show = false',
                    '@keydown.tab.prevent' => '$event.shiftKey || nextFocusable().focus()',
                    '@keydown.shift.tab.prevent' => 'prevFocusable().focus()',
                    'x-show' => 'show',
                    'class' => 'fixed top-0 inset-x-0 px-4 pt-6 z-50 flex items-top justify-center',
                    'style' => 'display: none;',
                ],

                'overlay' => [
                    'x-show' => 'show',
                    'class' => 'fixed inset-0 transform transition-all',
                    '@click' => 'show = false',
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
                    'x-show' => 'show',
                    'class' => 'bg-white p-4 rounded overflow-hidden shadow transform transition-all w-full',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:enter-start' => 'opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95',
                    'x-transition:enter-end' => 'opacity-100 translate-y-0 sm:scale-100',
                    'x-transition:leave' => 'ease-in duration-200',
                    'x-transition:leave-start' => 'opacity-100 translate-y-0 sm:scale-100',
                    'x-transition:leave-end' => 'opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95',
                ],
            ],

            /**
             * Navigations.
             */
            'dropdown' => [
                'container' => [
                    'class' => 'relative',
                    'x-data' => '{ open: false, }',
                    '@click.away' => 'open = false',
                    '@close.stop' => 'open = false',
                ],

                'trigger' => [
                    '@click' => 'open = !open',
                ],

                'dropdown' => [
                    'x-transition:enter' => 'transition ease-out duration-200',
                    'x-transition:enter-start' => 'transform opacity-0 scale-95',
                    'x-transition:enter-end' => 'transform opacity-100 scale-100',
                    'x-transition:leave' => 'transition ease-in duration-75',
                    'x-transition:leave-start' => 'transform opacity-100 scale-100',
                    'x-transition:leave-end' => 'transform opacity-0 scale-95',
                    'class' => 'absolute',
                    'x-show' => 'open',
                    '@click' => 'open = false',
                    'style' => 'display: none;',
                ],

                'align' => [
                    'left' => [
                        'class' => 'origin-top-left left-0',
                    ],

                    'top' => [
                        'class' => 'origin-top',
                    ],

                    'right' => [
                        'class' => 'origin-top-right right-0',
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
                'container' => [

                ],

                'link' => [
                    'class' => 'w-full flex items-center py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900',
                    'role' => 'menuitem',
                ],

                'button' => [
                    'class' => 'w-full flex items-center py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 outline-none focus:outline-none',
                    'role' => 'menuitem',
                ],

                'iconLeft' => 'mr-3',

                'iconRight' => 'ml-3',
            ],

            /**
             * Pickers.
             */
            'flatpickr' => [
                'flatpickr' => [
                    'x-data' => '{
                        initFlatpickr(element, options) {
                            flatpickr(element, options)
                        },
                    }',
                ],
            ],

            'pickr' => [
                'container' => [
                    'class' => 'mb-4',
                    'x-data' => '{
                        initPickr(element, inputId, options) {
                            const pickr = Pickr.create(options)
                            const input = document.getElementById(inputId)
                            pickr.on("save", (color) => {
                                input.setAttribute("value", color ? color.toHEXA().toString() : "")
                                element.setAttribute("title", color ? color.toHEXA().toString() : "")
                            })
                        },
                    }',
                ],

                'labelText' => '',

                'pickr' => [],

                'errors' => '',
            ],

            'pikaday' => [
                'pikaday' => [
                    'x-data' => '{
                        initPikaday(element, options) {
                            new Pikaday({ field: element, ...options })
                        },
                    }',
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
                'tr' => [
                    'class' => '',
                ],
            ],

            'table' => [
                'container' => [
                    'class' => 'mb-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg',
                ],

                'table' => [
                    'class' => 'min-w-full divide-y divide-gray-200',
                ],

                'thead' => [
                    'class' => '',
                ],

                'tbody' => [
                    'class' => 'bg-white divide-y divide-gray-200',
                ],

                'tfoot' => [
                    'class' => '',
                ],

                'emptyText' => [
                    'class' => 'px-6 py-4 whitespace-nowrap text-lg text-gray-500 text-center',
                ],
            ],
        ],
    ],

    'assets' => [
        'alpine' => [
            'https://cdn.jsdelivr.net/npm/alpinejs@2.7.3/dist/alpine.min.js',
        ],

        'moment' => [
            'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js',
        ],

        /**
         * Forms.
         */
        'inputmask' => [
            'https://cdn.jsdelivr.net/npm/inputmask@5.0.5/dist/inputmask.min.js',
            'Inputmask.extendAliases({
                date_pt_BR: {
                    alias: "datetime",
                    inputformat: "dd/mm/yyyy"
                },
                datetime_pt_BR: {
                    alias: "datetime",
                    inputformat: "dd/mm/yyyy HH:MM"
                },
                phone_pt_BR: {
                    mask: "(99) 99999999[9]"
                },
                price_pt_BR: {
                    alias: "numeric",
                    autoGroup: true,
                    groupSeparator: ".",
                    digits: 2,
                    digitsOptional: false,
                    radixPoint: ",",
                    prefix: "R$ ",
                    placeholder: "0",
                    unmaskAsNumber: true,
                    removeMaskOnSubmit: true
                },
                time_pt_BR: {
                    alias: "datetime",
                    inputformat: "HH:MM"
                },
                weight_pt_BR: {
                    mask: "9{1,3}[.9{1,2}]"
                },
                zipcode_pt_BR: {
                    mask: "99999-999"
                }
            })',
        ],

        /**
         * Pickers.
         */
        'flatpickr' => [
            'https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.css',
            'https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/flatpickr.min.js',
            $locale != 'en' ? 'https://cdn.jsdelivr.net/npm/flatpickr@4.6.6/dist/l10n/'.$locale.'.min.js' : '',
        ],

        'pickr' => [
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr@1.8.0/dist/themes/classic.min.css',
            'https://cdn.jsdelivr.net/npm/@simonwep/pickr@1.8.0/dist/pickr.min.js',
        ],

        'pikaday' => [
            'https://cdn.jsdelivr.net/npm/pikaday@1.8.2/css/pikaday.min.css',
            'https://cdn.jsdelivr.net/npm/pikaday@1.8.2/pikaday.min.js',
        ],

        /**
         * Editors.
         */
        'easy-mde' => [
            'https://cdn.jsdelivr.net/npm/easymde@2.13.0/dist/easymde.min.css',
            'https://cdn.jsdelivr.net/npm/easymde@2.13.0/dist/easymde.min.js',
        ],

        'quill' => [
            'https://cdn.quilljs.com/1.3.7/quill.snow.css',
            'https://cdn.quilljs.com/1.3.7/quill.min.js',
        ],

        'trix' => [
            'https://cdn.jsdelivr.net/npm/trix@1.3.1/dist/trix.min.css',
            'https://cdn.jsdelivr.net/npm/trix@1.3.1/dist/trix.min.js',
        ],
    ],
];
