<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Components Prefix
    |--------------------------------------------------------------------------
    |
    | This value will set a prefix for all TALLKit components.
    | By default it's empty. This is useful if you want to avoid
    | collision with components from other libraries.
    |
    | If set with "foo", for example, you can reference components like:
    |
    | <x-foo-input />
    |
    */

    'prefix' => '',

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | These options reference to how the assets are loaded.
    | You can disable or overwrite that you want.
    |
    */

    'options' => [

        /*
        |--------------------------------------------------------------------------
        | Assets URL
        |--------------------------------------------------------------------------
        |
        | This value sets the path to TALLKit assets, for cases where
        | your app's domain root is not the correct path. By default, TALLKit
        | will load its assets from the app's "relative root".
        |
        | Examples: "/assets", "myurl.com/app".
        |
        */
        'asset_url' => env('TALLKIT_ASSET_URL'),

        /*
        |--------------------------------------------------------------------------
        | Inject
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
            | This option use Play CDN what is it designed for development purposes only,
            | and is not the best choice for production.
            | See https://tailwindcss.com/docs/installation/play-cdn
            |
            */
            'tailwindcss' => env('TALLKIT_INJECT_TAILWINDCSS', function () {
                return app()->isLocal() && !(file_exists(base_path('tailwind.config.js') || file_exists(base_path('tailwind.config.ts'))));
            }),

            /*
            |
            | Inject alpinejs directly from the CDN, the url is in `assets.alpine`.
            | See https://github.com/alpinejs/alpine/tree/2.x#install
            | See https://alpinejs.dev/essentials/installation#from-a-script-tag
            |
            */
            'alpine' => env('TALLKIT_INJECT_ALPINE', true),
        ],

        /*
        |--------------------------------------------------------------------------
        | Register components aliases
        |--------------------------------------------------------------------------
        |
        | This option registers some components with multiple names, using `aliases`.
        |
        */
        'aliases' => true,

        /*
        |--------------------------------------------------------------------------
        | Upload
        |--------------------------------------------------------------------------
        |
        | This option registers route to upload files
        | using specific disk and middleware.
        |
        */
        'upload' => [
            'enabled' => env('TALLKIT_UPLOAD_ENABLED', true),
            'disk' => env('TALLKIT_UPLOAD_DISK'),
            'folder' => env('TALLKIT_UPLOAD_FOLDER', 'uploads'),
            'middleware' => env('TALLKIT_UPLOAD_MIDDLEWARE', 'web'),
        ],

        /*
        |--------------------------------------------------------------------------
        | Themes by route
        |--------------------------------------------------------------------------
        |
        | This option detect the theme name by route
        | using patterns with `Route::is(...$patterns)`.
        |
        */
        'themes_by_route' => [
            'admin' => ['admin.*'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Third Party Asset Libraries
    |--------------------------------------------------------------------------
    |
    | These settings hold reference to all third party libraries and their
    | asset files served through a CDN. Individual components can require
    | these asset files.
    |
    */

    'assets' => [

        /**
         * Tailwindcss.
         */
        'tailwindcss' => [
            'https://cdn.tailwindcss.com',
        ],

        /**
         * Alpine.
         */
        'alpine' => [
            'https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from TALLKit are loaded in. You can
    | disable or overwrite any component class or alias that you want.
    |
    */

    'components' => [
        'html' => \TALLKit\Components\Html\Html::class,
        'facebook-pixel-code' => \TALLKit\Components\FacebookPixelCode\FacebookPixelCode::class,
        'google-analytics' => \TALLKit\Components\GoogleAnalytics\GoogleAnalytics::class,
        'google-fonts' => \TALLKit\Components\GoogleFonts\GoogleFonts::class,
        'google-tag-manager' => \TALLKit\Components\GoogleTagManager\GoogleTagManager::class,
        'container' => \TALLKit\Components\Container\Container::class,
        'toolbar' => \TALLKit\Components\Toolbar\Toolbar::class,
        'icon'  => \TALLKit\Components\Icon\Icon::class,
        'card'  => \TALLKit\Components\Card\Card::class,
        'carbon'  => \TALLKit\Components\Carbon\Carbon::class,
        'cron'  => \TALLKit\Components\Cron\Cron::class,
        'countdown' => \TALLKit\Components\Countdown\Countdown::class,
        'error' => \TALLKit\Components\Error\Error::class,
        'full-calendar' => \TALLKit\Components\FullCalendar\FullCalendar::class,
        'logo' => \TALLKit\Components\Logo\Logo::class,
        'meta' => \TALLKit\Components\Meta\Meta::class,
        'fortawesome' => \TALLKit\Components\Fortawesome\Fortawesome::class,
        'iconify' => \TALLKit\Components\Iconify\Iconify::class,
        'progressbar' => \TALLKit\Components\Progressbar\Progressbar::class,
        'apex-charts' => \TALLKit\Components\ApexCharts\ApexCharts::class,
        'c3' => \TALLKit\Components\C3\C3::class,
        'chart-js' => \TALLKit\Components\ChartJs\ChartJs::class,
        'echarts' => \TALLKit\Components\Echarts\Echarts::class,
        'frappe-charts' => \TALLKit\Components\FrappeCharts\FrappeCharts::class,
        'fusion-charts' => \TALLKit\Components\FusionCharts\FusionCharts::class,
        'highcharts' => \TALLKit\Components\Highcharts\Highcharts::class,
        'fetchable' => \TALLKit\Components\Fetchable\Fetchable::class,
        'loading' => \TALLKit\Components\Loading\Loading::class,
        'pretty-print-json' => \TALLKit\Components\PrettyPrintJson\PrettyPrintJson::class,
        'toggleable' => \TALLKit\Components\Toggleable\Toggleable::class,
        'overlay' => \TALLKit\Components\Overlay\Overlay::class,
        'tooltip' => \TALLKit\Components\Tooltip\Tooltip::class,
        'accordion' => \TALLKit\Components\Accordion\Accordion::class,
        'accordion-item' => \TALLKit\Components\Accordion\AccordionItem::class,
        'slider' => \TALLKit\Components\Slider\Slider::class,
        'slider-item' => \TALLKit\Components\Slider\SliderItem::class,
        'splide' => \TALLKit\Components\Splide\Splide::class,
        'splide-item' => \TALLKit\Components\Splide\SplideItem::class,
        'swiper' => \TALLKit\Components\Swiper\Swiper::class,
        'swiper-item' => \TALLKit\Components\Swiper\SwiperItem::class,
        'badge' => \TALLKit\Components\Badge\Badge::class,
        'heading' => \TALLKit\Components\Table\Heading::class,
        'cell' => \TALLKit\Components\Table\Cell::class,
        'row' => \TALLKit\Components\Table\Row::class,
        'markdown' => \TALLKit\Components\Markdown\Markdown::class,
        'toc' => \TALLKit\Components\Markdown\Toc::class,
        'highlight' => \TALLKit\Components\Highlight\Highlight::class,
        'image-loader' => \TALLKit\Components\ImageLoader\ImageLoader::class,
        'unsplash' => \TALLKit\Components\Unsplash\Unsplash::class,
        'form-section' => \TALLKit\Components\FormSection\FormSection::class,
        'section' => \TALLKit\Components\Section\Section::class,
        'flickity' => \TALLKit\Components\Flickity\Flickity::class,
        'flickity-item' => \TALLKit\Components\Flickity\FlickityItem::class,
        'dropdown' => \TALLKit\Components\Dropdown\Dropdown::class,
        'validation-errors' => \TALLKit\Components\Forms\ValidationErrors::class,
        'nav' => \TALLKit\Components\Nav\Nav::class,
        'message' => \TALLKit\Components\Message\Message::class,
        'messages' => \TALLKit\Components\Message\Messages::class,
        'avatar' => \TALLKit\Components\Avatar\Avatar::class,
        'display' => \TALLKit\Components\Display\Display::class,
        'field' => \TALLKit\Components\Forms\Field::class,
        'field-error' => \TALLKit\Components\Forms\FieldError::class,
        'label' => \TALLKit\Components\Forms\Label::class,
        'submit' => \TALLKit\Components\Forms\Submit::class,
        'group' => \TALLKit\Components\Forms\Group::class,
        'input' => \TALLKit\Components\Forms\Input::class,
        'textarea' => \TALLKit\Components\Forms\Textarea::class,
        'select' => \TALLKit\Components\Forms\Select::class,
        'table' => \TALLKit\Components\Table\Table::class,
        'tab' => \TALLKit\Components\Tab\Tab::class,
        'tab-item' => \TALLKit\Components\Tab\TabItem::class,
        'dropzone' => \TALLKit\Components\Dropzone\Dropzone::class,
        'filepond' => \TALLKit\Components\Filepond\Filepond::class,
        'form-step' => \TALLKit\Components\Forms\FormStep::class,
        'form-stepper' => \TALLKit\Components\Forms\FormStepper::class,
        'form-steps' => \TALLKit\Components\Forms\FormSteps::class,
        'form' => \TALLKit\Components\Forms\Form::class,
        'fields-generator' => \TALLKit\Components\Forms\FieldsGenerator::class,
        'input-switch' => \TALLKit\Components\Forms\InputSwitch::class,
        'checkbox' => \TALLKit\Components\Forms\Checkbox::class,
        'checkbox-list' => \TALLKit\Components\Forms\CheckboxList::class,
        'easymde' => \TALLKit\Components\Easymde\Easymde::class,
        'menu' => \TALLKit\Components\Menu\Menu::class,
        'menu-dropdown' => \TALLKit\Components\MenuDropdown\MenuDropdown::class,
        'navbar' => \TALLKit\Components\Navbar\Navbar::class,
        'drawer' => \TALLKit\Components\Drawer\Drawer::class,
        'sidebar' => \TALLKit\Components\Sidebar\Sidebar::class,
        'field-view' => \TALLKit\Components\Forms\FieldView::class,
        'radio' => \TALLKit\Components\Forms\Radio::class,
        'radio-list' => \TALLKit\Components\Forms\RadioList::class,
        'modal' => \TALLKit\Components\Modal\Modal::class,
        'cookie-consent' => \TALLKit\Components\CookieConsent\CookieConsent::class,
        'pickr' => \TALLKit\Components\Pickr\Pickr::class,
        'pikaday' => \TALLKit\Components\Pikaday\Pikaday::class,
        'flatpickr' => \TALLKit\Components\Flatpickr\Flatpickr::class,
        'user-sidebar' => \TALLKit\Components\UserSidebar\UserSidebar::class,
        'user-menu' => \TALLKit\Components\UserMenu\UserMenu::class,
        'error-page' => \TALLKit\Components\ErrorPage\ErrorPage::class,
        'card-page' => \TALLKit\Components\CardPage\CardPage::class,
        'crud-header' => \TALLKit\Components\Crud\CrudHeader::class,
        'crud-actions' => \TALLKit\Components\Crud\CrudActions::class,
        'crud-index' => \TALLKit\Components\Crud\CrudIndex::class,
        'crud-form' => \TALLKit\Components\Crud\CrudForm::class,
        'crud-show' => \TALLKit\Components\Crud\CrudShow::class,
        'credit-card' => \TALLKit\Components\Payments\CreditCard::class,
        'payment-fields' => \TALLKit\Components\Payments\PaymentFields::class,
        'input-image' => \TALLKit\Components\Forms\InputImage::class,
        'many' => \TALLKit\Components\Forms\Many::class,
        'back-button' => \TALLKit\Components\BackButton\BackButton::class,
        'user-button' => \TALLKit\Components\UserButton\UserButton::class,
        'form-button' => \TALLKit\Components\FormButton\FormButton::class,
        'logout-button' => \TALLKit\Components\LogoutButton\LogoutButton::class,
        'button' => \TALLKit\Components\Button\Button::class,
        'quill' => \TALLKit\Components\Quill\Quill::class,
        'trix' => \TALLKit\Components\Trix\Trix::class,
        'tinymce' => \TALLKit\Components\Tinymce\Tinymce::class,

        //'control-panel' => \TALLKit\Components\Layouts\ControlPanel::class,
        //'datatable' => \TALLKit\Components\Tables\Datatable::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Aliases
    |--------------------------------------------------------------------------
    |
    | Below you reference all aliases of components that should be loaded for your app.
    | You can disable or overwrite alias that you want.
    |
    */


    //'aliases' => [
    //
    //    /**
    //     * Bars.
    //     */
    //    'nav-bar' => \TALLKit\Components\Bars\Navbar::class,
    //    'progress-bar' => \TALLKit\Components\Progressbar\Index::class,
    //    'progress' => \TALLKit\Components\Progressbar\Index::class,
    //    'side-bar' => \TALLKit\Components\Bars\Sidebar::class,
    //    'tool-bar' => \TALLKit\Components\Bars\Toolbar::class,
    //    'usersidebar' => \TALLKit\Components\Bars\UserSidebar::class,
    //    'user-side-bar' => \TALLKit\Components\Bars\UserSidebar::class,
    //
    //    /**
    //     * Buttons.
    //     */
    //    'bt' => \TALLKit\Components\Buttons\Button::class,
    //    'btn' => \TALLKit\Components\Buttons\Button::class,
    //    'menu-item' => \TALLKit\Components\Buttons\Button::class,
    //    'menuitem' => \TALLKit\Components\Buttons\Button::class,
    //    'menu-dropdown-item' => \TALLKit\Components\Buttons\Button::class,
    //    'menudropdownitem' => \TALLKit\Components\Buttons\Button::class,
    //    'navitem' => \TALLKit\Components\Buttons\Button::class,
    //    'sidebar-item' => \TALLKit\Components\Buttons\Button::class,
    //    'sidebaritem' => \TALLKit\Components\Buttons\Button::class,
    //    'button-form' => \TALLKit\Components\Buttons\FormButton::class,
    //    'bt-form' => \TALLKit\Components\Buttons\FormButton::class,
    //    'btn-form' => \TALLKit\Components\Buttons\FormButton::class,
    //    'form-bt' => \TALLKit\Components\Buttons\FormButton::class,
    //    'form-btn' => \TALLKit\Components\Buttons\FormButton::class,
    //    'user-bt' => \TALLKit\Components\Buttons\UserButton::class,
    //    'userbutton' => \TALLKit\Components\Buttons\UserButton::class,
    //
    //    /**
    //     * Charts.
    //     */
    //    'apex-chart' => \TALLKit\Components\Charts\ApexCharts::class,
    //    'apexchart' => \TALLKit\Components\Charts\ApexCharts::class,
    //    'apexcharts' => \TALLKit\Components\Charts\ApexCharts::class,
    //    'chartjs' => \TALLKit\Components\Charts\ChartJs::class,
    //    'chart.js' => \TALLKit\Components\Charts\ChartJs::class,
    //    'echart' => \TALLKit\Components\Charts\Echarts::class,
    //    'frappe' => \TALLKit\Components\Charts\FrappeCharts::class,
    //    'frappe-chart' => \TALLKit\Components\Charts\FrappeCharts::class,
    //    'frappechart' => \TALLKit\Components\Charts\FrappeCharts::class,
    //    'frappecharts' => \TALLKit\Components\Charts\FrappeCharts::class,
    //    'fusion-chart' => \TALLKit\Components\Charts\FusionCharts::class,
    //    'fusionchart' => \TALLKit\Components\Charts\FusionCharts::class,
    //    'fusioncharts' => \TALLKit\Components\Charts\FusionCharts::class,
    //    'highchart' => \TALLKit\Components\Charts\Highcharts::class,
    //    'high-chart' => \TALLKit\Components\Charts\Highcharts::class,
    //    'high-charts' => \TALLKit\Components\Charts\Highcharts::class,
    //
    //    /**
    //     * Crud.
    //     */
    //    'crud' => \TALLKit\Components\Crud\CrudIndex::class,
    //    'crud-list' => \TALLKit\Components\Crud\CrudIndex::class,
    //    'crud-new' => \TALLKit\Components\Crud\CrudForm::class,
    //    'crud-create' => \TALLKit\Components\Crud\CrudForm::class,
    //    'crud-edit' => \TALLKit\Components\Crud\CrudForm::class,
    //    'crud-update' => \TALLKit\Components\Crud\CrudForm::class,
    //    'crud-view' => \TALLKit\Components\Crud\CrudShow::class,
    //
    //    /**
    //     * Datetimes.
    //     */
    //    'count-down' => \TALLKit\Components\Datetimes\Countdown::class,
    //    'calendar' => \TALLKit\Components\Datetimes\FullCalendar::class,
    //    'fullcalendar' => \TALLKit\Components\Datetimes\FullCalendar::class,
    //
    //    /**
    //     * Editors.
    //     */
    //    'easy-mde' => \TALLKit\Components\Editors\Easymde::class,
    //    'mde' => \TALLKit\Components\Editors\Easymde::class,
    //    'tiny' => \TALLKit\Components\Editors\Tinymce::class,
    //    'tiny-mce' => \TALLKit\Components\Editors\Tinymce::class,
    //
    //    /**
    //     * Forms.
    //     */
    //    'check' => \TALLKit\Components\Forms\Checkbox::class,
    //    'checklist' => \TALLKit\Components\Forms\CheckboxList::class,
    //    'check-list' => \TALLKit\Components\Forms\CheckboxList::class,
    //    'checkboxlist' => \TALLKit\Components\Forms\CheckboxList::class,
    //    'checkboxes' => \TALLKit\Components\Forms\CheckboxList::class,
    //    'form-field' => \TALLKit\Components\Forms\Field::class,
    //    'input-error' => \TALLKit\Components\Forms\FieldError::class,
    //    'form-error' => \TALLKit\Components\Forms\FieldError::class,
    //    'form-field-error' => \TALLKit\Components\Forms\FieldError::class,
    //    'form-field-view' => \TALLKit\Components\Forms\FieldView::class,
    //    'input-view' => \TALLKit\Components\Forms\FieldView::class,
    //    'view' => \TALLKit\Components\Forms\FieldView::class,
    //    'view-field' => \TALLKit\Components\Forms\FieldView::class,
    //    'view-input' => \TALLKit\Components\Forms\FieldView::class,
    //    'generator-fields' => \TALLKit\Components\Forms\FieldsGenerator::class,
    //    'form-wizard' => \TALLKit\Components\Forms\FormStepper::class,
    //    'form-group' => \TALLKit\Components\Forms\Group::class,
    //    'image-preview' => \TALLKit\Components\Forms\InputImage::class,
    //    'lbl' => \TALLKit\Components\Forms\Label::class,
    //    'multiple' => \TALLKit\Components\Forms\Many::class,
    //    'radiolist' => \TALLKit\Components\Forms\RadioList::class,
    //    'radios' => \TALLKit\Components\Forms\RadioList::class,
    //    'radioslist' => \TALLKit\Components\Forms\RadioList::class,
    //    'radios-list' => \TALLKit\Components\Forms\RadioList::class,
    //    'input-toggle' => \TALLKit\Components\Forms\InputSwitch::class,
    //    'switch' => \TALLKit\Components\Forms\InputSwitch::class,
    //    'validation-bag' => \TALLKit\Components\Forms\ValidationErrors::class,
    //    'validation-error' => \TALLKit\Components\Forms\ValidationErrors::class,
    //    'validation' => \TALLKit\Components\Forms\ValidationErrors::class,
    //
    //    /**
    //     * Icons.
    //     */
    //    'fa' => \TALLKit\Components\Icons\Fortawesome::class,
    //    'i' => \TALLKit\Components\Icons\Icon::class,
    //
    //    /**
    //     * Layouts.
    //     */
    //    'auth' => \TALLKit\Components\Layouts\CardPage::class,
    //    'auth-page' => \TALLKit\Components\Layouts\CardPage::class,
    //    'authentication' => \TALLKit\Components\Layouts\CardPage::class,
    //    'authentication-page' => \TALLKit\Components\Layouts\CardPage::class,
    //    'content' => \TALLKit\Components\Layouts\Container::class,
    //    'admin' => \TALLKit\Components\Layouts\ControlPanel::class,
    //    'admin-page' => \TALLKit\Components\Layouts\ControlPanel::class,
    //    'control' => \TALLKit\Components\Layouts\ControlPanel::class,
    //    'cp' => \TALLKit\Components\Layouts\ControlPanel::class,
    //    'panel' => \TALLKit\Components\Layouts\ControlPanel::class,
    //    'panel-page' => \TALLKit\Components\Layouts\ControlPanel::class,
    //
    //    /**
    //     * Markdowns.
    //     */
    //    'md' => \TALLKit\Components\Markdowns\Markdown::class,
    //
    //    /**
    //     * Menus.
    //     */
    //    'dropdown-menu' => \TALLKit\Components\Menus\MenuDropdown::class,
    //    'navigation' => \TALLKit\Components\Menus\Nav::class,
    //    'menu-user' => \TALLKit\Components\Menus\UserMenu::class,
    //
    //    /**
    //     * Messages.
    //     */
    //    'alert' => \TALLKit\Components\Messages\Message::class,
    //
    //    /**
    //     * Overlays.
    //     */
    //    'consent' => \TALLKit\Components\Overlays\CookieConsent::class,
    //    'dialog' => \TALLKit\Components\Overlays\Modal::class,
    //    'backdrop' => \TALLKit\Components\Overlays\Overlay::class,
    //    'toggle' => \TALLKit\Components\Overlays\Toggleable::class,
    //
    //    /**
    //     * Panels.
    //     */
    //    'accordionitem' => \TALLKit\Components\Panels\AccordionItem::class,
    //    'tabitem' => \TALLKit\Components\Panels\TabItem::class,
    //
    //    /**
    //     * Payments.
    //     */
    //    'creditcard' => \TALLKit\Components\Payments\CreditCard::class,
    //    'paymentfields' => \TALLKit\Components\Payments\PaymentFields::class,
    //    'payment-form' => \TALLKit\Components\Payments\PaymentFields::class,
    //    'paymentform' => \TALLKit\Components\Payments\PaymentFields::class,
    //
    //    /**
    //     * Pickers.
    //     */
    //    'datetime-picker' => \TALLKit\Components\Pickers\Flatpickr::class,
    //    'datetimepicker' => \TALLKit\Components\Pickers\Flatpickr::class,
    //    'color-picker' => \TALLKit\Components\Pickers\Pickr::class,
    //    'colorpicker' => \TALLKit\Components\Pickers\Pickr::class,
    //    'date-picker' => \TALLKit\Components\Pickers\Pikaday::class,
    //    'datepicker' => \TALLKit\Components\Pickers\Pikaday::class,
    //
    //    /**
    //     * Scripts.
    //     */
    //    'facebookpixelcode' => \TALLKit\Components\Scripts\FacebookPixelCode::class,
    //    'facebookpixel' => \TALLKit\Components\Scripts\FacebookPixelCode::class,
    //    'facebook-pixel' => \TALLKit\Components\Scripts\FacebookPixelCode::class,
    //    'analytics' => \TALLKit\Components\Scripts\GoogleAnalytics::class,
    //    'googleanalytics' => \TALLKit\Components\Scripts\GoogleAnalytics::class,
    //    'googlefonts' => \TALLKit\Components\Scripts\GoogleFonts::class,
    //    'googletagmanager' => \TALLKit\Components\Scripts\GoogleTagManager::class,
    //    'gtm' => \TALLKit\Components\Scripts\GoogleTagManager::class,
    //    'turbolinks' => \TALLKit\Components\Scripts\Turbo::class,
    //
    //    /**
    //     * Sliders.
    //     */
    //    'flickityitem' => \TALLKit\Components\Sliders\FlickityItem::class,
    //    'slideritem' => \TALLKit\Components\Sliders\SliderItem::class,
    //    'splideitem' => \TALLKit\Components\Sliders\SplideItem::class,
    //    'swiperitem' => \TALLKit\Components\Sliders\SwiperItem::class,
    //
    //    /**
    //     * States.
    //     */
    //    'status' => \TALLKit\Components\States\Badge::class,
    //    'preview' => \TALLKit\Components\States\Display::class,
    //    'value' => \TALLKit\Components\States\Display::class,
    //    'spinner' => \TALLKit\Components\States\Loading::class,
    //
    //    /**
    //     * Supports.
    //     */
    //    'api' => \TALLKit\Components\Supports\Fetchable::class,
    //    'data' => \TALLKit\Components\Supports\Fetchable::class,
    //    'fetch' => \TALLKit\Components\Supports\Fetchable::class,
    //    'hljs' => \TALLKit\Components\Supports\Highlight::class,
    //    'img-loader' => \TALLKit\Components\Supports\ImageLoader::class,
    //    'load-img' => \TALLKit\Components\Supports\ImageLoader::class,
    //    'load-image' => \TALLKit\Components\Supports\ImageLoader::class,
    //    'json' => \TALLKit\Components\Supports\PrettyPrintJson::class,
    //    'pretty-json' => \TALLKit\Components\Supports\PrettyPrintJson::class,
    //    'prettyjson' => \TALLKit\Components\Supports\PrettyPrintJson::class,
    //    'pretty-print' => \TALLKit\Components\Supports\PrettyPrintJson::class,
    //    'prettyprint' => \TALLKit\Components\Supports\PrettyPrintJson::class,
    //    'prettyprintjson' => \TALLKit\Components\Supports\PrettyPrintJson::class,
    //    'print-json' => \TALLKit\Components\Supports\PrettyPrintJson::class,
    //    'printjson' => \TALLKit\Components\Supports\PrettyPrintJson::class,
    //
    //    /**
    //     * Tables.
    //     */
    //    'td' => \TALLKit\Components\Tables\Cell::class,
    //    'head' => \TALLKit\Components\Tables\Heading::class,
    //    'th' => \TALLKit\Components\Tables\Heading::class,
    //    'tr' => \TALLKit\Components\Tables\Row::class,
    //],

    /*
    |--------------------------------------------------------------------------
    | Livewire Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all the Livewire components that should be loaded
    | for your app. By default all components from TALLKit are loaded in.
    |
    */

    //'livewire' => [
    //    /**
    //     * Crud.
    //     */
    //    'crud' => \TALLKit\Components\Livewire\Crud\CrudIndex::class,
    //    'crud-index' => \TALLKit\Components\Livewire\Crud\CrudIndex::class,
    //
    //    /**
    //     * Tables.
    //     */
    //    'datatable' => \TALLKit\Components\Livewire\Tables\Datatable::class,
    //],

    /*
    |--------------------------------------------------------------------------
    | Themes
    |--------------------------------------------------------------------------
    |
    | Below you reference to the customization of all components by theme.
    | You can overwrite any customization that you want.
    |
    */

    //'themes' => [
    //    'default' => [
    //        'input' => [
    //            'root' => [
    //                // 'class' => '',
    //            ],
    //        ],
    //    ],
    //],
    //
    //'props' => [
    //    'default' => [
    //        'input' => [
    //            // 'size' => 'lg',
    //        ],
    //    ],
    //],
];
