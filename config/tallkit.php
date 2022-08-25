<?php

$lang = str_replace('_', '-', app()->getLocale());
$locale = strtolower(substr($lang, 0, 2));

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
    | <x-foo-easymde />
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
        | This value sets the path to TALLKit JavaScript assets, for cases where
        | your app's domain root is not the correct path. By default, TALLKit
        | will load its JavaScript assets from the app's "relative root".
        |
        | Examples: "/assets", "myurl.com/app".
        |
        */
        'asset_url' => env('TALLKIT_ASSET_URL'),

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

            'tailwindcss' => config('app.env') === 'local',

            /*
            |
            | Inject alpinejs directly from the CDN, the url is in `assets.alpine`.
            | See https://github.com/alpinejs/alpine/tree/2.x#install
            | See https://alpinejs.dev/essentials/installation#from-a-script-tag
            |
            */
            'alpine' => true,
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
            //'https://cdn.jsdelivr.net/npm/tailwindcss@2/dist/tailwind.min.css', // v2
            'https://cdn.tailwindcss.com', // v3
        ],

        /**
         * Alpine.
         */
        'alpine' => [
            //'https://cdn.jsdelivr.net/npm/alpinejs@2/dist/alpine.min.js', // v2
            'https://cdn.jsdelivr.net/npm/alpinejs@3/dist/cdn.min.js', // v3
        ],

        /**
         * Charts.
         */
        'apex-charts' => [
            'https://cdn.jsdelivr.net/npm/apexcharts@3/dist/apexcharts.min.js',
        ],
        'c3' => [
            'https://cdn.jsdelivr.net/npm/c3@0.7/c3.min.css',
            'https://cdn.jsdelivr.net/npm/d3@5/dist/d3.min.js',
            'https://cdn.jsdelivr.net/npm/c3@0.7/c3.min.js',
        ],
        'chart-js' => [
            'https://cdn.jsdelivr.net/npm/chart.js@3/dist/chart.min.js',
        ],
        'echarts' => [
            'https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js',
        ],
        'frappe-charts' => [
            'https://cdn.jsdelivr.net/npm/frappe-charts@1/dist/frappe-charts.min.umd.js',
        ],
        'fusion-charts' => [
            'https://cdn.jsdelivr.net/npm/fusioncharts@3/fusioncharts.js',
        ],
        'fusion-charts-fusion' => [
            'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.fusion.js',
        ],
        'fusion-charts-gammel' => [
            'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.gammel.js',
        ],
        'fusion-charts-candy' => [
            'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.candy.js',
        ],
        'fusion-charts-zune' => [
            'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.zune.js',
        ],
        'fusion-charts-ocean' => [
            'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.ocean.js',
        ],
        'fusion-charts-carbon' => [
            'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.carbon.js',
        ],
        'fusion-charts-umber' => [
            'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.umber.js',
        ],
        'highcharts' => [
            'https://cdn.jsdelivr.net/npm/highcharts@10/highcharts.min.js',
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

        'tinymce' => [
            'https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js',
        ],

        'trix' => [
            'https://cdn.jsdelivr.net/npm/trix@1/dist/trix.min.css',
            'https://cdn.jsdelivr.net/npm/trix@1/dist/trix.min.js',
        ],

        /**
         * Forms.
         */
        'cleave' => [
            'https://cdn.jsdelivr.net/npm/cleave.js@1/dist/cleave.min.js',
        ],

        'imask' => [
            'https://cdn.jsdelivr.net/npm/imask@6/dist/imask.min.js',
        ],

        'tagify' => [
            'https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.css',
            'https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.polyfills.min.js',
            'https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.min.js',
        ],

        /**
         * Moment.
         */
        'moment' => [
            'https://cdn.jsdelivr.net/npm/moment@2/moment.min.js',
        ],

        'moment-timezone' => [
            'https://cdn.jsdelivr.net/npm/moment-timezone@0/builds/moment-timezone-with-data.min.js',
        ],

        /**
         * Overlays.
         */
        'tooltip' => [
            'https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js',
            'https://cdn.jsdelivr.net/npm/tippy.js@6/dist/tippy-bundle.umd.min.js',
            'https://cdn.jsdelivr.net/npm/tippy.js@6/dist/tippy.css',
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
         * Scripts.
         */
        'turbo' => [
            'module' => 'https://cdn.jsdelivr.net/npm/@hotwired/turbo@7/dist/turbo.es2017-umd.js',
            'livewire' => 'https://cdn.jsdelivr.net/npm/livewire-turbolinks/dist/livewire-turbolinks.js',
        ],

        /**
         * Sliders.
         */
        'flickity' => [
            'https://cdn.jsdelivr.net/npm/flickity@2/dist/flickity.min.css',
            'https://cdn.jsdelivr.net/npm/flickity@2/dist/flickity.pkgd.min.js',
        ],

        'splide' => [
            'https://cdn.jsdelivr.net/npm/@splidejs/splide@2/dist/css/splide.min.css',
            'https://cdn.jsdelivr.net/npm/@splidejs/splide@2/dist/js/splide.min.js',
        ],

        'swiper' => [
            'https://cdn.jsdelivr.net/npm/swiper@7/swiper-bundle.min.css',
            'https://cdn.jsdelivr.net/npm/swiper@7/swiper-bundle.min.js',
        ],

        /**
         * Uploaders.
         */
        'dropzone' => [
            'https://cdn.jsdelivr.net/npm/dropzone@6.0.0-beta.1/dist/dropzone.css',
            'https://cdn.jsdelivr.net/npm/dropzone@6.0.0-beta.1/dist/dropzone-min.js',
        ],

        'filepond' => [
            'https://cdn.jsdelivr.net/npm/filepond@4/dist/filepond.min.css',
            'https://cdn.jsdelivr.net/npm/filepond@4/dist/filepond.min.js',
        ],

        'FilePondPluginFileEncode' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-file-encode@2/dist/filepond-plugin-file-encode.min.js',
        ],

        'FilePondPluginFileMetadata' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-file-metadata@1/dist/filepond-plugin-file-metadata.min.js',
        ],

        'FilePondPluginFilePoster' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-file-poster@2/dist/filepond-plugin-file-poster.min.css',
            'https://cdn.jsdelivr.net/npm/filepond-plugin-file-poster@2/dist/filepond-plugin-file-poster.min.js',
        ],

        'FilePondPluginFileRename' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-file-rename@1/dist/filepond-plugin-file-rename.min.js',
        ],

        'FilePondPluginFileValidateSize' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-size@2/dist/filepond-plugin-file-validate-size.min.js',
        ],

        'FilePondPluginFileValidateType' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-type@1/dist/filepond-plugin-file-validate-type.min.js',
        ],

        'FilePondPluginImageCrop' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-crop@2/dist/filepond-plugin-image-crop.min.js',
        ],

        'FilePondPluginImageEdit' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-edit@1/dist/filepond-plugin-image-edit.min.css',
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-edit@1/dist/filepond-plugin-image-edit.min.js',
        ],

        'FilePondPluginImageExifOrientation' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-exif-orientation@1/dist/filepond-plugin-image-exif-orientation.min.js',
        ],

        'FilePondPluginImageFilter' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-filter@1/dist/filepond-plugin-image-filter.min.js',
        ],

        'FilePondPluginImagePreview' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4/dist/filepond-plugin-image-preview.css',
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4/dist/filepond-plugin-image-preview.min.js',
        ],

        'FilePondPluginImageResize' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-resize@1/dist/filepond-plugin-image-resize.min.js',
        ],

        'FilePondPluginImageTransform' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-transform@3/dist/filepond-plugin-image-transform.min.js',
        ],

        'FilePondPluginImageValidateSize' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-validate-size@1/dist/filepond-plugin-image-validate-size.min.js',
        ],

        'FilePondPluginMediaPreview' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-media-preview@1/dist/filepond-plugin-media-preview.min.css',
            'https://cdn.jsdelivr.net/npm/filepond-plugin-media-preview@1/dist/filepond-plugin-media-preview.min.js',
        ],

        'FilePondPluginGetFile' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-get-file@1/dist/filepond-plugin-get-file.min.css',
            'https://cdn.jsdelivr.net/npm/filepond-plugin-get-file@1/dist/filepond-plugin-get-file.min.js',
        ],

        'FilePondPluginPdfPreview' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-pdf-preview@1/dist/filepond-plugin-pdf-preview.min.css',
            'https://cdn.jsdelivr.net/npm/filepond-plugin-pdf-preview@1/dist/filepond-plugin-pdf-preview.min.js',
        ],

        'FilePondPluginImageOverlay' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-overlay@1/dist/filepond-plugin-image-overlay.min.css',
            'https://cdn.jsdelivr.net/npm/filepond-plugin-image-overlay@1/dist/filepond-plugin-image-overlay.min.js',
        ],

        'FilePondPluginPdfConvert' => [
            'https://cdn.jsdelivr.net/npm/pdfjs-dist@2/build/pdf.min.js',
            'https://cdn.jsdelivr.net/npm/filepond-plugin-pdf-convert@1/dist/filepond-plugin-pdf-convert.min.js',
        ],

        'FilePondPluginCopyPath' => [
            'https://cdn.jsdelivr.net/npm/filepond-plugin-copy-path@1/dist/filepond-plugin-copy-path.min.js',
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

        /**
         * Bars.
         */
        'navbar' => \TALLKit\Components\Bars\Navbar::class,
        'progressbar' => \TALLKit\Components\Bars\Progressbar::class,
        'sidebar' => \TALLKit\Components\Bars\Sidebar::class,
        'toolbar' => \TALLKit\Components\Bars\Toolbar::class,
        'user-sidebar' => \TALLKit\Components\Bars\UserSidebar::class,

        /**
         * Buttons.
         */
        'back' => \TALLKit\Components\Buttons\Back::class,
        'button' => \TALLKit\Components\Buttons\Button::class,
        'form-button' => \TALLKit\Components\Buttons\FormButton::class,
        'logout' => \TALLKit\Components\Buttons\Logout::class,
        'user-button' => \TALLKit\Components\Buttons\UserButton::class,

        /**
         * Charts.
         */
        'apex-charts' => \TALLKit\Components\Charts\ApexCharts::class,
        'c3' => \TALLKit\Components\Charts\C3::class,
        'chart-js' => \TALLKit\Components\Charts\ChartJs::class,
        'echarts' => \TALLKit\Components\Charts\Echarts::class,
        'frappe-charts' => \TALLKit\Components\Charts\FrappeCharts::class,
        'fusion-charts' => \TALLKit\Components\Charts\FusionCharts::class,
        'highcharts' => \TALLKit\Components\Charts\Highcharts::class,

        /**
         * Crud.
         */
        'crud-header' => \TALLKit\Components\Crud\CrudHeader::class,
        'crud-actions' => \TALLKit\Components\Crud\CrudActions::class,
        'crud-index' => \TALLKit\Components\Crud\CrudIndex::class,
        'crud-form' => \TALLKit\Components\Crud\CrudForm::class,
        'crud-show' => \TALLKit\Components\Crud\CrudShow::class,

        /**
         * Datetimes.
         */
        'carbon' => \TALLKit\Components\Datetimes\Carbon::class,
        'countdown' => \TALLKit\Components\Datetimes\Countdown::class,

        /**
         * Editors.
         */
        'easymde' => \TALLKit\Components\Editors\Easymde::class,
        'editor' => \TALLKit\Components\Editors\Editor::class,
        'quill' => \TALLKit\Components\Editors\Quill::class,
        'trix' => \TALLKit\Components\Editors\Trix::class,
        'tinymce' => \TALLKit\Components\Editors\Tinymce::class,

        /**
         * Forms.
         */
        'checkbox' => \TALLKit\Components\Forms\Checkbox::class,
        'checkbox-list' => \TALLKit\Components\Forms\CheckboxList::class,
        'field' => \TALLKit\Components\Forms\Field::class,
        'field-error' => \TALLKit\Components\Forms\FieldError::class,
        'field-group' => \TALLKit\Components\Forms\FieldGroup::class,
        'field-view' => \TALLKit\Components\Forms\FieldView::class,
        'fields-generator' => \TALLKit\Components\Forms\FieldsGenerator::class,
        'form' => \TALLKit\Components\Forms\Form::class,
        'group' => \TALLKit\Components\Forms\Group::class,
        'input' => \TALLKit\Components\Forms\Input::class,
        'input-image' => \TALLKit\Components\Forms\InputImage::class,
        'label' => \TALLKit\Components\Forms\Label::class,
        'many' => \TALLKit\Components\Forms\Many::class,
        'radio' => \TALLKit\Components\Forms\Radio::class,
        'radio-list' => \TALLKit\Components\Forms\RadioList::class,
        'select' => \TALLKit\Components\Forms\Select::class,
        'submit' => \TALLKit\Components\Forms\Submit::class,
        'textarea' => \TALLKit\Components\Forms\Textarea::class,
        'validation-errors' => \TALLKit\Components\Forms\ValidationErrors::class,

        /**
         * Icons.
         */
        'icon' => \TALLKit\Components\Icons\Icon::class,

        /**
         * Layouts.
         */
        'admin-panel' => \TALLKit\Components\Layouts\ControlPanel::class,
        'authentication-card' => \TALLKit\Components\Layouts\AuthenticationCard::class,
        'container' => \TALLKit\Components\Layouts\Container::class,
        'control-panel' => \TALLKit\Components\Layouts\ControlPanel::class,
        'display' => \TALLKit\Components\Layouts\Display::class,
        'error' => \TALLKit\Components\Layouts\Error::class,
        'html' => \TALLKit\Components\Layouts\Html::class,
        'loading' => \TALLKit\Components\Layouts\Loading::class,
        'logo' => \TALLKit\Components\Layouts\Logo::class,
        'meta' => \TALLKit\Components\Layouts\Meta::class,

        /**
         * Markdowns.
         */
        'markdown' => \TALLKit\Components\Markdowns\Markdown::class,
        'toc' => \TALLKit\Components\Markdowns\Toc::class,

        /**
         * Menus.
         */
        'menu' => \TALLKit\Components\Menus\Menu::class,
        'menu-dropdown' => \TALLKit\Components\Menus\MenuDropdown::class,
        'nav' => \TALLKit\Components\Menus\Nav::class,
        'user-menu' => \TALLKit\Components\Menus\UserMenu::class,

        /**
         * Messages.
         */
        'message' => \TALLKit\Components\Messages\Message::class,

        /**
         * Overlays.
         */
        'cookie-consent' => \TALLKit\Components\Overlays\CookieConsent::class,
        'drawer' => \TALLKit\Components\Overlays\Drawer::class,
        'dropdown' => \TALLKit\Components\Overlays\Dropdown::class,
        'modal' => \TALLKit\Components\Overlays\Modal::class,
        'overlay' => \TALLKit\Components\Overlays\Overlay::class,
        'toggleable' => \TALLKit\Components\Overlays\Toggleable::class,
        'tooltip' => \TALLKit\Components\Overlays\Tooltip::class,

        /**
         * Panels.
         */
        'accordion' => \TALLKit\Components\Panels\Accordion::class,
        'accordion-item' => \TALLKit\Components\Panels\AccordionItem::class,
        'card' => \TALLKit\Components\Panels\Card::class,
        'form-section' => \TALLKit\Components\Panels\FormSection::class,
        'section' => \TALLKit\Components\Panels\Section::class,
        'tab' => \TALLKit\Components\Panels\Tab::class,
        'tab-item' => \TALLKit\Components\Panels\TabItem::class,

        /**
         * Pickers.
         */
        'flatpickr' => \TALLKit\Components\Pickers\Flatpickr::class,
        'pickr' => \TALLKit\Components\Pickers\Pickr::class,
        'pikaday' => \TALLKit\Components\Pickers\Pikaday::class,

        /**
         * Scripts.
         */
        'facebook-pixel-code' => \TALLKit\Components\Scripts\FacebookPixelCode::class,
        'google-analytics' => \TALLKit\Components\Scripts\GoogleAnalytics::class,
        'google-fonts' => \TALLKit\Components\Scripts\GoogleFonts::class,
        'google-tag-manager' => \TALLKit\Components\Scripts\GoogleTagManager::class,
        'turbo' => \TALLKit\Components\Scripts\Turbo::class,

        /**
         * Sliders.
         */
        'flickity' => \TALLKit\Components\Sliders\Flickity::class,
        'flickity-item' => \TALLKit\Components\Sliders\FlickityItem::class,
        'slider' => \TALLKit\Components\Sliders\Slider::class,
        'slider-item' => \TALLKit\Components\Sliders\SliderItem::class,
        'splide' => \TALLKit\Components\Sliders\Splide::class,
        'splide-item' => \TALLKit\Components\Sliders\SplideItem::class,
        'swiper' => \TALLKit\Components\Sliders\Swiper::class,
        'swiper-item' => \TALLKit\Components\Sliders\SwiperItem::class,

        /**
         * Supports.
         */
        'avatar' => \TALLKit\Components\Supports\Avatar::class,
        'cron' => \TALLKit\Components\Supports\Cron::class,
        'fetchable' => \TALLKit\Components\Supports\Fetchable::class,
        'image-loader' => \TALLKit\Components\Supports\ImageLoader::class,
        'unsplash' => \TALLKit\Components\Supports\Unsplash::class,

        /**
         * Tables.
         */
        'cell' => \TALLKit\Components\Tables\Cell::class,
        'datatable' => \TALLKit\Components\Tables\Datatable::class,
        'heading' => \TALLKit\Components\Tables\Heading::class,
        'row' => \TALLKit\Components\Tables\Row::class,
        'table' => \TALLKit\Components\Tables\Table::class,

        /**
         * Uploaders.
         */
        'dropzone' => \TALLKit\Components\Uploaders\Dropzone::class,
        'filepond' => \TALLKit\Components\Uploaders\Filepond::class,
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

    'aliases' => [

        /**
         * Bars.
         */
        'nav-bar' => \TALLKit\Components\Bars\Navbar::class,
        'progress-bar' => \TALLKit\Components\Bars\Progressbar::class,
        'side-bar' => \TALLKit\Components\Bars\Sidebar::class,
        'tool-bar' => \TALLKit\Components\Bars\Toolbar::class,
        'usersidebar' => \TALLKit\Components\Bars\UserSidebar::class,
        'user-side-bar' => \TALLKit\Components\Bars\UserSidebar::class,

        /**
         * Buttons.
         */
        'bt' => \TALLKit\Components\Buttons\Button::class,
        'btn' => \TALLKit\Components\Buttons\Button::class,
        'menu-item' => \TALLKit\Components\Buttons\Button::class,
        'menuitem' => \TALLKit\Components\Buttons\Button::class,
        'menu-dropdown-item' => \TALLKit\Components\Buttons\Button::class,
        'menudropdownitem' => \TALLKit\Components\Buttons\Button::class,
        'navitem' => \TALLKit\Components\Buttons\Button::class,
        'sidebar-item' => \TALLKit\Components\Buttons\Button::class,
        'sidebaritem' => \TALLKit\Components\Buttons\Button::class,
        'button-form' => \TALLKit\Components\Buttons\FormButton::class,
        'bt-form' => \TALLKit\Components\Buttons\FormButton::class,
        'btn-form' => \TALLKit\Components\Buttons\FormButton::class,
        'form-bt' => \TALLKit\Components\Buttons\FormButton::class,
        'form-btn' => \TALLKit\Components\Buttons\FormButton::class,
        'user-bt' => \TALLKit\Components\Buttons\UserButton::class,
        'userbutton' => \TALLKit\Components\Buttons\UserButton::class,

        /**
         * Charts.
         */
        'apex-chart' => \TALLKit\Components\Charts\ApexCharts::class,
        'apexchart' => \TALLKit\Components\Charts\ApexCharts::class,
        'apexcharts' => \TALLKit\Components\Charts\ApexCharts::class,
        'chartjs' => \TALLKit\Components\Charts\ChartJs::class,
        'chart.js' => \TALLKit\Components\Charts\ChartJs::class,
        'echart' => \TALLKit\Components\Charts\Echarts::class,
        'frappe' => \TALLKit\Components\Charts\FrappeCharts::class,
        'frappe-chart' => \TALLKit\Components\Charts\FrappeCharts::class,
        'frappechart' => \TALLKit\Components\Charts\FrappeCharts::class,
        'frappecharts' => \TALLKit\Components\Charts\FrappeCharts::class,
        'fusion-chart' => \TALLKit\Components\Charts\FusionCharts::class,
        'fusionchart' => \TALLKit\Components\Charts\FusionCharts::class,
        'fusioncharts' => \TALLKit\Components\Charts\FusionCharts::class,
        'highchart' => \TALLKit\Components\Charts\Highcharts::class,
        'high-chart' => \TALLKit\Components\Charts\Highcharts::class,
        'high-charts' => \TALLKit\Components\Charts\Highcharts::class,

        /**
         * Crud.
         */
        'crud' => \TALLKit\Components\Crud\CrudIndex::class,
        'crud-list' => \TALLKit\Components\Crud\CrudIndex::class,
        'crud-new' => \TALLKit\Components\Crud\CrudForm::class,
        'crud-create' => \TALLKit\Components\Crud\CrudForm::class,
        'crud-edit' => \TALLKit\Components\Crud\CrudForm::class,
        'crud-update' => \TALLKit\Components\Crud\CrudForm::class,
        'crud-view' => \TALLKit\Components\Crud\CrudShow::class,

        /**
         * Datetimes.
         */
        'count-down' => \TALLKit\Components\Datetimes\Countdown::class,

        /**
         * Editors.
         */
        'easy-mde' => \TALLKit\Components\Editors\Easymde::class,
        'mde' => \TALLKit\Components\Editors\Easymde::class,
        'tiny' => \TALLKit\Components\Editors\Tinymce::class,
        'tiny-mce' => \TALLKit\Components\Editors\Tinymce::class,

        /**
         * Forms.
         */
        'check' => \TALLKit\Components\Forms\Checkbox::class,
        'checklist' => \TALLKit\Components\Forms\CheckboxList::class,
        'check-list' => \TALLKit\Components\Forms\CheckboxList::class,
        'checkboxlist' => \TALLKit\Components\Forms\CheckboxList::class,
        'checkboxes' => \TALLKit\Components\Forms\CheckboxList::class,
        'form-field' => \TALLKit\Components\Forms\Field::class,
        'input-error' => \TALLKit\Components\Forms\FieldError::class,
        'form-error' => \TALLKit\Components\Forms\FieldError::class,
        'form-field-error' => \TALLKit\Components\Forms\FieldError::class,
        'form-field-view' => \TALLKit\Components\Forms\FieldView::class,
        'input-view' => \TALLKit\Components\Forms\FieldView::class,
        'view' => \TALLKit\Components\Forms\FieldView::class,
        'view-field' => \TALLKit\Components\Forms\FieldView::class,
        'view-input' => \TALLKit\Components\Forms\FieldView::class,
        'form-group' => \TALLKit\Components\Forms\Group::class,
        'generator-fields' => \TALLKit\Components\Forms\FieldsGenerator::class,
        'image-preview' => \TALLKit\Components\Forms\InputImage::class,
        'lbl' => \TALLKit\Components\Forms\Label::class,
        'multiple' => \TALLKit\Components\Forms\Many::class,
        'radiolist' => \TALLKit\Components\Forms\RadioList::class,
        'radios' => \TALLKit\Components\Forms\RadioList::class,
        'radioslist' => \TALLKit\Components\Forms\RadioList::class,
        'radios-list' => \TALLKit\Components\Forms\RadioList::class,
        'validation-bag' => \TALLKit\Components\Forms\ValidationErrors::class,
        'validation-error' => \TALLKit\Components\Forms\ValidationErrors::class,
        'validation' => \TALLKit\Components\Forms\ValidationErrors::class,

        /**
         * Icons.
         */
        'i' => \TALLKit\Components\Icons\Icon::class,

        /**
         * Layouts.
         */
        'auth' => \TALLKit\Components\Layouts\AuthenticationCard::class,
        'auth-card' => \TALLKit\Components\Layouts\AuthenticationCard::class,
        'authentication' => \TALLKit\Components\Layouts\AuthenticationCard::class,
        'content' => \TALLKit\Components\Layouts\Container::class,
        'admin' => \TALLKit\Components\Layouts\ControlPanel::class,
        'admin-card' => \TALLKit\Components\Layouts\ControlPanel::class,
        'control' => \TALLKit\Components\Layouts\ControlPanel::class,
        'cp' => \TALLKit\Components\Layouts\ControlPanel::class,
        'panel' => \TALLKit\Components\Layouts\ControlPanel::class,
        'preview' => \TALLKit\Components\Layouts\Display::class,

        /**
         * Markdowns.
         */
        'md' => \TALLKit\Components\Markdowns\Markdown::class,

        /**
         * Menus.
         */
        'dropdown-menu' => \TALLKit\Components\Menus\MenuDropdown::class,
        'navigation' => \TALLKit\Components\Menus\Nav::class,
        'menu-user' => \TALLKit\Components\Menus\UserMenu::class,

        /**
         * Messages.
         */
        'alert' => \TALLKit\Components\Messages\Message::class,

        /**
         * Overlays.
         */
        'consent' =>  \TALLKit\Components\Overlays\CookieConsent::class,
        'backdrop' => \TALLKit\Components\Overlays\Overlay::class,
        'toggle' => \TALLKit\Components\Overlays\Toggleable::class,

        /**
         * Panels.
         */
        'accordionitem' => \TALLKit\Components\Panels\AccordionItem::class,
        'tabitem' => \TALLKit\Components\Panels\TabItem::class,

        /**
         * Pickers.
         */
        'datetime-picker' => \TALLKit\Components\Pickers\Flatpickr::class,
        'datetimepicker' => \TALLKit\Components\Pickers\Flatpickr::class,
        'color-picker' => \TALLKit\Components\Pickers\Pickr::class,
        'colorpicker' => \TALLKit\Components\Pickers\Pickr::class,
        'date-picker' => \TALLKit\Components\Pickers\Pikaday::class,
        'datepicker' => \TALLKit\Components\Pickers\Pikaday::class,

        /**
         * Scripts.
         */
        'facebookpixelcode' => \TALLKit\Components\Scripts\FacebookPixelCode::class,
        'facebookpixel' => \TALLKit\Components\Scripts\FacebookPixelCode::class,
        'facebook-pixel' => \TALLKit\Components\Scripts\FacebookPixelCode::class,
        'analytics' => \TALLKit\Components\Scripts\GoogleAnalytics::class,
        'googleanalytics' => \TALLKit\Components\Scripts\GoogleAnalytics::class,
        'googlefonts' => \TALLKit\Components\Scripts\GoogleFonts::class,
        'googletagmanager' => \TALLKit\Components\Scripts\GoogleTagManager::class,
        'gtm' => \TALLKit\Components\Scripts\GoogleTagManager::class,
        'turbolinks' => \TALLKit\Components\Scripts\Turbo::class,

        /**
         * Sliders.
         */
        'flickityitem' => \TALLKit\Components\Sliders\FlickityItem::class,
        'slideritem' => \TALLKit\Components\Sliders\SliderItem::class,
        'splideitem' => \TALLKit\Components\Sliders\SplideItem::class,
        'swiperitem' => \TALLKit\Components\Sliders\SwiperItem::class,

        /**
         * Supports.
         */
        'api' => \TALLKit\Components\Supports\Fetchable::class,
        'data' => \TALLKit\Components\Supports\Fetchable::class,
        'fetch' => \TALLKit\Components\Supports\Fetchable::class,
        'img-loader' => \TALLKit\Components\Supports\ImageLoader::class,
        'load-img' => \TALLKit\Components\Supports\ImageLoader::class,
        'load-image' => \TALLKit\Components\Supports\ImageLoader::class,

        /**
         * Tables.
         */
        'td' => \TALLKit\Components\Tables\Cell::class,
        'head' => \TALLKit\Components\Tables\Heading::class,
        'th' => \TALLKit\Components\Tables\Heading::class,
        'tr' => \TALLKit\Components\Tables\Row::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all the Livewire components that should be loaded
    | for your app. By default all components from TALLKit are loaded in.
    |
    */

    'livewire' => [
        /**
         * Crud.
         */
        'crud' => \TALLKit\Components\Livewire\Crud\CrudIndex::class,
        'crud-index' => \TALLKit\Components\Livewire\Crud\CrudIndex::class,

        /**
         * Tables.
         */
        'datatable' => \TALLKit\Components\Livewire\Tables\Datatable::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Themes
    |--------------------------------------------------------------------------
    |
    | Below you reference to the customization of all components by theme.
    | You can  overwrite any customization  that you want.
    |
    */

    'themes' => [
        'default' => [

            /**
             * Bars.
             */
            'navbar' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-data' => 'window.tallkit.component(\'navbar\')',
                    '@click.away' => 'close',
                    '@click.outside' => 'close',
                    '@keydown.escape.window' => 'close',
                    'class' => 'flex flex-wrap items-center relative',
                ],

                'aligns' => [
                    'start' => [
                        'class' => 'justify-start',
                    ],

                    'end' => [
                        'class' => 'justify-end',
                    ],

                    'center' => [
                        'class' => 'justify-center',
                    ],

                    'between' => [
                        'class' => 'justify-between',
                    ],

                    'around' => [
                        'class' => 'justify-around',
                    ],

                    'evenly' => [
                        'class' => 'justify-evenly',
                    ],
                ],

                'breakpoints' => [
                    'sm' => [
                        'container' => [
                            'class' => 'sm:flex-nowrap',
                        ],

                        'logo' => [],

                        'toggler' => [
                            'class' => 'sm:hidden',
                        ],

                        'nav' => [
                            'class' => 'sm:flex sm:w-auto sm:grow-0 sm:flex-row sm:items-center sm:max-h-full sm:relative',
                        ],

                        'animated' => [
                            'class' => 'sm:transition-none',
                        ],
                    ],

                    'md' => [
                        'container' => [
                            'class' => 'md:flex-nowrap',
                        ],

                        'logo' => [],

                        'toggler' => [
                            'class' => 'md:hidden',
                        ],

                        'nav' => [
                            'class' => 'md:flex md:w-auto md:grow-0 md:flex-row md:items-center md:max-h-full md:relative',
                        ],

                        'animated' => [
                            'class' => 'md:transition-none',
                        ],
                    ],

                    'lg' => [
                        'container' => [
                            'class' => 'lg:flex-nowrap',
                        ],

                        'logo' => [],

                        'toggler' => [
                            'class' => 'lg:hidden',
                        ],

                        'nav' => [
                            'class' => 'lg:flex lg:w-auto lg:grow-0 lg:flex-row lg:items-center lg:max-h-full lg:relative',
                        ],

                        'animated' => [
                            'class' => 'lg:transition-none',
                        ],
                    ],

                    'xl' => [
                        'container' => [
                            'class' => 'xl:flex-nowrap',
                        ],

                        'logo' => [],

                        'toggler' => [
                            'class' => 'xl:hidden',
                        ],

                        'nav' => [
                            'class' => 'xl:flex xl:w-auto xl:grow-0 xl:flex-row xl:items-center xl:max-h-full xl:relative',
                        ],

                        'animated' => [
                            'class' => 'xl:transition-none',
                        ],
                    ],

                    '2xl' => [
                        'container' => [
                            'class' => '2xl:flex-nowrap',
                        ],

                        'logo' => [],

                        'toggler' => [
                            'class' => '2xl:hidden',
                        ],

                        'nav' => [
                            'class' => '2xl:flex 2xl:w-auto 2xl:grow-0 2xl:flex-row 2xl:items-center 2xl:max-h-full 2xl:relative',
                        ],

                        'animated' => [
                            'class' => '2xl:transition-none',
                        ],
                    ],
                ],

                'logo' => [],

                'toggler' => [
                    '@click' => 'toggle',
                ],

                'nav' => [
                    'x-ref' => 'nav',
                    ':class' => '{ \'hidden\': isClosed() }',
                    ':style' => 'style()',
                    'class' => 'w-full grow flex-col items-start max-h-0',

                    'theme:li' => [
                        'class' => 'w-full',
                    ],
                ],

                'animated' => [
                    'class' => 'transition-all',
                ],
            ],

            'progressbar' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'progressbar\')',
                ],

                'bar' => [
                    'class' => 'bg-gray-200',
                ],

                'progress' => [
                    'class' => 'text-center text-white',
                    ':style' => 'style()',
                ],

                'colors' => [
                    'default' => [
                        'class' => 'bg-blue-400',
                    ],

                    'info' => [
                        'class' => 'bg-blue-400',
                    ],

                    'error' => [
                        'class' => 'bg-red-400',
                    ],

                    'success' => [
                        'class' => 'bg-green-400',
                    ],

                    'warning' => [
                        'class' => 'bg-yellow-400',
                    ],

                    'indigo' => [
                        'class' => 'bg-indigo-400',
                    ],

                    'none' => [],
                ],

                'durations' => [
                    'default' => [
                        'class' => 'duration-500',
                    ],

                    '100' => [
                        'class' => 'duration-100',
                    ],

                    '300' => [
                        'class' => 'duration-300',
                    ],

                    '500' => [
                        'class' => 'duration-500',
                    ],

                    '700' => [
                        'class' => 'duration-700',
                    ],

                    '1000' => [
                        'class' => 'duration-1000',
                    ],

                    'none' => [],
                ],

                'sizes' => [
                    'default' => [
                        'class' => 'h-4 text-sm leading-4',
                    ],

                    'sm' => [
                        'class' => 'h-2 text-xs leading-2',
                    ],

                    'md' => [
                        'class' => 'h-4 text-sm leading-4',
                    ],

                    'lg' => [
                        'class' => 'h-6 text-base leading-6',
                    ],

                    'xl' => [
                        'class' => 'h-8 text-lg leading-8',
                    ],

                    '2xl' => [
                        'class' => 'h-10 text-xl leading-10',
                    ],

                    'none' => [],
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
            ],

            'sidebar' => [
                'drawer' => [],

                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'sidebar\')',
                    '@resize.window' => 'check',
                ],

                'nav' => [
                    'class' => 'h-full bg-gray-700 overflow-y-auto',
                ],

                'item' => [
                    'class' => 'text-gray-100 !py-4 !px-6 hover:bg-black/10',
                ],

                'active' => [
                    'class' => 'bg-black/25 hover:bg-black/25',
                ],

                'breakpoints' => [
                    'sm' => [
                        ':class' => '{ \'sm:static\': isOpened() }',
                    ],

                    'md' => [
                        ':class' => '{ \'md:static\': isOpened() }',
                    ],

                    'lg' => [
                        ':class' => '{ \'lg:static\': isOpened() }',
                    ],

                    'xl' => [
                        ':class' => '{ \'xl:static\': isOpened() }',
                    ],

                    '2xl' => [
                        ':class' => '{ \'2xl:static\': isOpened() }',
                    ],
                ],

                'overlays' => [
                    'sm' => [
                        'class' => 'sm:hidden',
                    ],

                    'md' => [
                        'class' => 'md:hidden',
                    ],

                    'lg' => [
                        'class' => 'lg:hidden',
                    ],

                    'xl' => [
                        'class' => 'xl:hidden',
                    ],

                    '2xl' => [
                        'class' => '2xl:hidden',
                    ],
                ],

                'trigger' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-data' => '',
                    'class' => 'cursor-pointer',
                ],
            ],

            'toolbar' => [
                'container' => [
                    'class' => 'flex justify-between items-center p-4 bg-white border-b-4 border-indigo-700',
                ],

                'title' => [
                    'class' => 'hidden sm:block flex-1 text-2xl font-medium',
                ],
            ],

            'user-sidebar' => [
                'container' => [],

                'logo' => [
                    'class' => 'text-white w-60 p-10',
                ],

                'trigger' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-data' => 'window.tallkit.component(\'user-sidebar\')',
                    'class' => 'fixed z-10 bottom-2 right-2 bg-white',
                    '@click' => 'click',
                ],
            ],

            /**
             * Buttons.
             */
            'button' => [
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

                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'class' => 'inline-flex items-center space-x-2 py-2 px-3 transition outline-none focus:outline-none',
                ],

                'types' => [
                    'link' => [],

                    'button' => [],
                ],

                'loading' => [
                    'link' => [
                        'x-data' => 'window.tallkit.component(\'button\')',
                        'x-cloak' => '',
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
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 192 512"><path fill="currentColor" d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z"></path></svg>',
                    ],

                    'show' => [
                        'text' => 'Show',
                        'tooltip' => 'Show',
                        'color' => 'default',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 576 512"><path fill="currentColor" d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"></path></svg>',
                        'loading' => 'Showing',
                    ],

                    'add' => [
                        'text' => 'Add',
                        'tooltip' => 'Add',
                        'color' => 'success',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>',
                        'loading' => 'Adding',
                    ],

                    'create' => [
                        'text' => 'Create',
                        'tooltip' => 'Create',
                        'color' => 'success',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>',
                        'loading' => 'Creating',
                    ],

                    'create-many' => [
                        'text' => 'Create many',
                        'tooltip' => 'Create many',
                        'color' => 'success',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>',
                        'loading' => 'Creating',
                    ],

                    'edit' => [
                        'text' => 'Edit',
                        'tooltip' => 'Edit',
                        'color' => 'info',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path></svg>',
                        'loading' => 'Editing',
                    ],

                    'delete' => [
                        'text' => 'Delete',
                        'tooltip' => 'Delete',
                        'color' => 'error',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>',
                        'loading' => 'Deleting',
                    ],

                    'save' => [
                        'text' => 'Save',
                        'tooltip' => 'Save',
                        'color' => 'success',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg>',
                        'loading' => 'Saving',
                    ],

                    'save-and-view' => [
                        'text' => 'Save and view',
                        'tooltip' => 'Save and view',
                        'color' => 'success',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg>',
                        'loading' => 'Saving',
                    ],

                    'send' => [
                        'text' => 'Send',
                        'tooltip' => 'Send',
                        'color' => 'info',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M503.691 189.836L327.687 37.851C312.281 24.546 288 35.347 288 56.015v80.053C127.371 137.907 0 170.1 0 322.326c0 61.441 39.581 122.309 83.333 154.132 13.653 9.931 33.111-2.533 28.077-18.631C66.066 312.814 132.917 274.316 288 272.085V360c0 20.7 24.3 31.453 39.687 18.164l176.004-152c11.071-9.562 11.086-26.753 0-36.328z"></path></svg>',
                        'loading' => 'Sending',
                    ],

                    'back' => [
                        'text' => 'Back',
                        'tooltip' => 'Back',
                        'color' => 'default',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 256 512"><path fill="currentColor" d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"></path></svg>',
                        'loading' => 'Returning',
                    ],

                    'back-right' => [
                        'text' => 'Back',
                        'tooltip' => 'Back',
                        'color' => 'default',
                        'icon-right' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 256 512"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg>',
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
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"></path></svg>',
                        'loading' => 'Entering',
                    ],

                    'update' => [
                        'text' => 'Update',
                        'tooltip' => 'Update',
                        'color' => 'info',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg>',
                        'loading' => 'Updating',
                    ],

                    'download' => [
                        'text' => 'Download',
                        'tooltip' => 'Download',
                        'color' => 'indigo',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg>',
                        'loading' => 'Downloading',
                    ],

                    'view' => [
                        'text' => 'View',
                        'tooltip' => 'View',
                        'color' => 'default',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 576 512"><path fill="currentColor" d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"></path></svg>',
                        'loading' => 'Viewing',
                    ],

                    'move-up' => [
                        'text' => 'Move up',
                        'tooltip' => 'Move up',
                        'color' => 'success',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path></svg>',
                        'loading' => 'Moving',
                    ],

                    'move-down' => [
                        'text' => 'Move down',
                        'tooltip' => 'Move down',
                        'color' => 'success',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M413.1 222.5l22.2 22.2c9.4 9.4 9.4 24.6 0 33.9L241 473c-9.4 9.4-24.6 9.4-33.9 0L12.7 278.6c-9.4-9.4-9.4-24.6 0-33.9l22.2-22.2c9.5-9.5 25-9.3 34.3.4L184 343.4V56c0-13.3 10.7-24 24-24h32c13.3 0 24 10.7 24 24v287.4l114.8-120.5c9.3-9.8 24.8-10 34.3-.4z"></path></svg>',
                        'loading' => 'Moving',
                    ],

                    'copy' => [
                        'text' => 'Copy',
                        'tooltip' => 'Copy',
                        'color' => 'warning',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 448 512"><path fill="currentColor" d="M433.941 65.941l-51.882-51.882A48 48 0 0 0 348.118 0H176c-26.51 0-48 21.49-48 48v48H48c-26.51 0-48 21.49-48 48v320c0 26.51 21.49 48 48 48h224c26.51 0 48-21.49 48-48v-48h80c26.51 0 48-21.49 48-48V99.882a48 48 0 0 0-14.059-33.941zM266 464H54a6 6 0 0 1-6-6V150a6 6 0 0 1 6-6h74v224c0 26.51 21.49 48 48 48h96v42a6 6 0 0 1-6 6zm128-96H182a6 6 0 0 1-6-6V54a6 6 0 0 1 6-6h106v88c0 13.255 10.745 24 24 24h88v202a6 6 0 0 1-6 6zm6-256h-64V48h9.632c1.591 0 3.117.632 4.243 1.757l48.368 48.368a6 6 0 0 1 1.757 4.243V112z"></path></svg>',
                        'loading' => 'Copying',
                    ],

                    'search' => [
                        'text' => 'Search',
                        'tooltip' => 'Search',
                        'color' => 'info',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>',
                        'loading' => 'Searching',
                    ],

                    'logout' => [
                        'text' => 'Logout',
                        'tooltip' => 'Logout',
                        'color' => 'none',
                        'rounded' => 'none',
                        'shadow' => 'none',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 24 24"><path fill="currentColor" d="M5 21q-.825 0-1.413-.587Q3 19.825 3 19V5q0-.825.587-1.413Q4.175 3 5 3h7v2H5v14h7v2Zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5Z"></path></svg>',
                        'loading' => true,
                    ],

                    'select-all' => [
                        'text' => 'Select All',
                        'link-text' => true,
                        'color' => 'blue',
                        'rounded' => 'none',
                        'shadow' => 'none',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 24 24"><path fill="currentColor" d="m10.6 16.2l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4ZM5 21q-.825 0-1.413-.587Q3 19.825 3 19V5q0-.825.587-1.413Q4.175 3 5 3h14q.825 0 1.413.587Q21 4.175 21 5v14q0 .825-.587 1.413Q19.825 21 19 21Zm0-2h14V5H5v14ZM5 5v14V5Z"></path></svg>',
                    ],

                    'deselect-all' => [
                        'text' => 'Deselect All',
                        'link-text' => true,
                        'color' => 'blue',
                        'rounded' => 'none',
                        'shadow' => 'none',
                        'icon' => '<svg class="w-4 h-4 mx-auto" viewBox="0 0 24 24"><path fill="currentColor" d="M5 21q-.825 0-1.413-.587Q3 19.825 3 19V5q0-.825.587-1.413Q4.175 3 5 3h14q.825 0 1.413.587Q21 4.175 21 5v14q0 .825-.587 1.413Q19.825 21 19 21Zm0-2h14V5H5v14Z"></path></svg>',
                    ],

                    'toggler' => [
                        'color' => 'none',
                        'rounded' => 'none',
                        'shadow' => 'none',
                        'icon' => '<svg class="w-6 h-6 mx-auto" viewBox="0 0 24 24"><path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
                    ],
                ],
            ],

            'form-button' => [
                'container' => [
                    'class' => 'inline-block',
                ],

                'button' => [],

                'presets' => [
                    'delete' => [
                        'method' => 'delete',
                        'confirm' => 'Do you really want to delete?',
                    ],
                ],
            ],

            'logout' => [
                'button' => [],
            ],

            'user-button' => [
                'container' => [],

                'icon' => [
                    'class' => 'w-8 h-8 rounded-full overflow-hidden bg-indigo-700 text-white shadow flex items-center justify-center font-bold',
                ],

                'avatar' => [],
            ],

            /**
             * Charts.
             */
            'apex-charts' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,apex-charts',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'apex-charts\')',
                ],

                'fetchable' => [
                    'theme:content' => 'grid place-items-center',
                ],
            ],

            'c3' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,c3',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'c3\')',
                ],

                'fetchable' => [
                    'theme:content' => 'grid place-items-center',
                ],
            ],

            'chart-js' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,chart-js',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'chart-js\')',
                ],

                'fetchable' => [
                    'theme:content' => 'grid place-items-center',
                ],

                'canvas' => [
                    'x-ref' => 'canvas',
                ],
            ],

            'echarts' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,echarts',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'echarts\')',
                ],

                'fetchable' => [
                    'theme:content' => 'grid place-items-center',
                ],
            ],

            'frappe-charts' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,frappe-charts',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'frappe-charts\')',
                ],

                'fetchable' => [
                    'theme:content' => 'grid place-items-center',
                ],
            ],

            'fusion-charts' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,fusion-charts',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'fusion-charts\')',
                ],

                'fetchable' => [
                    'theme:content' => 'grid place-items-center',
                ],
            ],

            'highcharts' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,highcharts',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'highcharts\')',
                ],

                'fetchable' => [
                    'theme:content' => 'grid place-items-center',
                ],
            ],

            /**
             * Crud.
             */
            'crud-actions' => [
                'custom' => [],

                'menu-dropdown' => [
                    'class' => 'w-full',

                    'theme:container' => [
                        'class' => 'w-full',
                    ],
                ],

                'show' => [],

                'edit' => [],

                'copy' => [],

                'move-up' => [],

                'move-down' => [],

                'destroy' => [],
            ],

            'crud-header' => [
                'container' => [
                    'class' => 'flex flex-col space-y-4 lg:flex-row lg:space-y-0 lg:space-x-4 lg:items-center justify-between pb-4',
                ],

                'title' => [
                    'class' => 'text-xl font-medium',
                ],

                'actions' => [
                    'class' => 'flex space-x-2 items-center justify-end',
                ],
            ],

            'crud-index' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'header' => [],

                'create' => [],

                'datatable' => [],

                'row-actions' => [
                    'class' => 'flex space-x-2 items-center justify-end',
                ],

                'actions' => [],
            ],

            'crud-form' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'header' => [],

                'header-save' => [
                    'name' => 'crud-form',
                    'value' => 'save',
                ],

                'header-save-and-view' => [
                    'name' => 'crud-form',
                    'value' => 'save-and-view',
                ],

                'header-back' => [],

                'content' => [],

                'footer' => [
                    'class' => 'flex space-x-4 items-center justify-end pt-4',
                ],

                'footer-save' => [
                    'name' => 'crud-form',
                    'value' => 'save',
                ],

                'footer-save-and-view' => [
                    'name' => 'crud-form',
                    'value' => 'save-and-view',
                ],

                'footer-back' => [],
            ],

            'crud-show' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'header' => [],

                'header-actions' => [],

                'header-back' => [],

                'content' => [],

                'footer' => [
                    'class' => 'flex space-x-2 items-center justify-end pt-4',
                ],

                'footer-actions' => [],

                'footer-back' => [],
            ],

            /**
             * Datetimes.
             */
            'carbon' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,moment,moment-timezone',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'carbon\')',
                ],
            ],

            'countdown' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'countdown\')',
                ],

                'days' => [
                    'x-ref' => 'days',
                ],

                'hours' => [
                    'x-ref' => 'hours',
                ],

                'minutes' => [
                    'x-ref' => 'minutes',
                ],

                'seconds' => [
                    'x-ref' => 'seconds',
                ],
            ],

            /**
             * Editors.
             */
            'easymde' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,easymde',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'easymde\')',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'label-text' => [
                    'class' => 'mb-1',
                ],

                'loading' => [
                    'x-show' => 'isLoading()',
                    'class' => 'mb-4 w-full py-2 px-3 bg-white border border-gray-200 bg-white rounded shadow',
                ],

                'editor' => [
                    ':class' => '{\'invisible\': !isCompleted()}',
                    'x-ref' => 'editor',
                ],

                'options' => [
                    // See https://github.com/Ionaru/easy-markdown-editor#configuration
                    'forceSync' => true,
                ],
            ],

            'quill' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,quill',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'quill\')',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'label-text' => [
                    'class' => 'mb-1',
                ],

                'loading' => [
                    'x-show' => 'isLoading()',
                    'class' => 'mb-4 w-full py-2 px-3 bg-white border border-gray-200 bg-white rounded shadow',
                ],

                'input' => [
                    'x-ref' => 'input',
                ],

                'editor' => [
                    'x-ref' => 'editor',
                    ':class' => '{\'invisible\': !isCompleted()}',
                    'class' => 'quill-container bg-white',
                ],

                'options' => [
                    // See https://quilljs.com/docs/configuration/#options
                    'modules' => [
                        'toolbar' => [
                            [['size' => ['small', false, 'large', 'huge']]],
                            ['bold', 'italic', 'underline', 'strike'],
                            ['blockquote', 'code-block'],
                            [['list' => 'ordered'], ['list' => 'bullet'], ['align' => []]],
                            ['link', 'image', 'video'],
                            [['script' => 'sub'], ['script' => 'super']],
                            [['indent' => '-1'], ['indent' => '+1']],
                            [['direction' => 'rtl']],
                            [['color' => []], ['background' => []]],
                            ['clean'],
                        ],
                    ],
                    'theme' => 'snow',
                ],
            ],

            'tinymce' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,tinymce',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'tinymce\')',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'label-text' => [
                    'class' => 'mb-1',
                ],

                'loading' => [
                    'x-show' => 'isLoading()',
                    'class' => 'mb-4 w-full py-2 px-3 bg-white border border-gray-200 bg-white rounded shadow',
                ],

                'input' => [
                    'x-ref' => 'input',
                ],

                'editor' => [
                    ':class' => '{\'invisible\': !isCompleted()}',
                    'x-ref' => 'editor',
                ],

                'options' => [
                    'hidden_input' => false,
                    'branding' => false,
                    'menubar' => false,
                    'language' => app()->getLocale(),
                    'plugins' => [
                        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                        'insertdatetime', 'media', 'table', 'help', 'wordcount',
                        'autoresize', 'autosave', 'codesample', 'directionality', 'emoticons', 'nonbreaking',
                        'pagebreak', 'visualchars',
                    ],
                    'toolbar' => 'undo redo | blocks | bold italic
                        | forecolor backcolor
                        | alignleft aligncenter alignright alignjustify
                        | bullist numlist | image media | table | link
                        | preview | code | removeformat | fullscreen',
                ],
            ],

            'trix' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,trix',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'trix\')',
                    'x-init' => 'setup',
                    'x-on:trix-change' => 'change',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'label-text' => [
                    'class' => 'mb-1',
                ],

                'loading' => [
                    'x-show' => 'isLoading()',
                    'class' => 'mb-4 w-full py-2 px-3 bg-white border border-gray-200 bg-white rounded shadow',
                ],

                'input' => [],

                'editor' => [
                    // See https://trix-editor.org/
                    ':class' => '{\'invisible\': !isCompleted()}',
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

                'label-text' => [
                    'class' => 'ml-3',
                ],

                'checkbox' => [
                    'class' => 'h-4 w-4 border-gray-200 rounded shadow shrink-0',
                ],
            ],

            'checkbox-list' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'x-data' => 'window.tallkit.component(\'checkbox-list\')',
                ],

                'group' => [],

                'header' => [
                    'class' => 'flex items-center justify-between',
                ],

                'actions' => [],

                'select-all' => [
                    '@click' => 'select(true)',
                ],

                'deselect-all' => [
                    '@click' => 'select(false)',
                ],

                'checkbox' => [
                    'theme:container' => '!mb-0',
                ],
            ],

            'field' => [
                'container' => [
                    'class' => 'mb-4',
                ],

                'label' => [
                    'class' => 'block',
                ],

                'label-text' => [
                    'class' => 'mb-1',
                ],

                'field-error' => [],

                'display' => [
                    'class' => 'flex items-center justify-center my-4 text-center border border-gray-200 rounded shadow bg-white p-2 max-w-xs max-h-72',
                ],
            ],

            'field-error' => [
                'container' => [
                    'class' => 'mt-1 text-red-600 text-sm italic',
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

            'field-view' => [
                'container' => [],

                'display' => [
                    'class' => 'py-2 px-3',

                    'theme:img' => [
                        'class' => 'mx-auto max-w-xs max-h-72',
                    ],

                    'theme:audio' => [
                        'class' => 'mx-auto max-w-xs max-h-72',
                    ],

                    'theme:video' => [
                        'class' => 'mx-auto max-w-xs max-h-72',
                    ],
                ],
            ],

            'fields-generator' => [
                'container' => [],
            ],

            'form' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-data' => 'window.tallkit.component(\'form\')',
                    '@submit' => 'prepareSubmit',
                ],
            ],

            'group' => [
                'container' => [],

                'label-text' => [
                    'class' => 'mb-1',
                ],

                'fieldset' => [
                    'class' => 'bg-white border p-6 rounded shadow overflow-auto',
                ],

                'div' => [],

                'types' => [
                    'block' => [],

                    'inline' => [
                        'class' => 'flex flex-wrap space-x-6',
                    ],

                    'grid-1' => [
                        'class' => 'grid gap- grid-cols-1',
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

                'cleave' => [
                    'data-tallkit-assets' => 'alpine,cleave',
                    'x-data' => 'window.tallkit.component(\'cleave\')',
                    'x-ref' => 'input',
                ],

                'tagify' => [
                    'data-tallkit-assets' => 'alpine,tagify',
                    'x-data' => 'window.tallkit.component(\'tagify\')',
                    'x-ref' => 'input',
                ],
            ],

            'input-image' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'input-image\')',
                    'x-init' => 'setup',
                ],

                'label' => [],

                'label-text' => [
                    'class' => 'mb-1',
                ],

                'field' => [
                    'class' => 'relative bg-white inline-block overflow-hidden border border-gray-200 rounded shadow focus-within:ring',
                ],

                'input' => [
                    'x-ref' => 'input',
                    '@change' => 'change',
                    'class' => 'absolute opacity-0 w-full h-full -z-50',
                    'type' => 'file',
                ],

                'empty' => [
                    'x-show' => 'isEmpty()',
                    '@click.prevent' => 'edit',
                    'class' => 'w-full h-full',
                ],

                'empty-icon-svg' => '<svg class="inline-block w-6 h-6" viewBox="0 0 512 512"><path fill="currentColor" d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"></path></svg>',

                'loading' => [
                    'x-show' => 'isLoading()',
                    'class' => 'w-full h-full flex items-center justify-center p-2',
                ],

                'loading-icon' => 'animate-spin w-6 h-6 shadown',

                'loading-icon-name' => 'loading',

                'loading-icon-svg' => '<svg fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>',

                'error' => [
                    'x-show' => 'isFailed()',
                    '@click.prevent' => 'edit',
                    'class' => 'w-full h-full',
                ],

                'error-icon-svg' => '<svg class="inline-block w-6 h-6" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>',

                'complete' => [
                    'x-show' => 'isCompleted()',
                    'class' => 'w-full h-full flex flex-col items-center justify-center',
                ],

                'img' => [
                    'data-turbo-cache' => 'false',
                    'data-turbolinks-cache' => 'false',
                    'x-ref' => 'output',
                    'class' => 'm-4 cursor-pointer',
                ],

                'actions' => [
                    'class' => 'w-full h-full flex items-center justify-center border-t p-2',
                ],

                'edit' => [
                    '@click.prevent' => 'edit',
                    'class' => 'transition transform hover:scale-125',
                ],

                'edit-icon' => [
                    'class' => 'w-6 h-6',
                ],

                'edit-icon-name' => 'pencil',

                'edit-icon-svg' => '<svg viewBox="0 0 512 512"><path fill="currentColor" d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path></svg>',

                'delete' => [
                    'class' => 'transition transform hover:scale-125',
                ],

                'delete-icon' => [
                    'class' => 'w-6 h-6',
                ],

                'delete-icon-name' => 'trash',

                'delete-icon-svg' => '<svg viewBox="0 0 512 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>',
            ],

            'label' => [
                'container' => [
                    'class' => 'block',
                ],
            ],

            'many' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'many\')',
                ],

                'header-create' => [
                    '@click' => 'create',
                ],

                'table' => [
                    'x-ref' => 'items',
                ],

                'row' => [
                    'x-ref' => 'item',
                ],

                'td' => [],

                'field' => [
                    'theme:container' => [
                        'class' => '!m-0',
                    ],
                ],

                'actions' => [
                    'class' => 'w-20',
                ],

                'create' => [
                    'x-show' => 'showCreate(index)',
                    '@click' => 'create',
                ],

                'delete' => [
                    'x-show' => 'showRemove(index)',
                    '@click' => 'remove(index)',
                ],
            ],

            'radio' => [
                'label' => [
                    'class' => 'inline-flex items-center',
                ],

                'label-text' => [
                    'class' => 'ml-3',
                ],

                'radio' => [
                    'class' => 'h-4 w-4 border-gray-200 shadow',
                ],
            ],

            'radio-list' => [
                'container' => [],

                'radio' => [
                    'theme:container' => '!mb-0',
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
                'message' => [],

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
             * Icons.
             */
            'icon' => [
                'presets' => [
                    'check' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59L21 7Z"></path></svg>',
                    'close' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z"></path></svg>',
                    'dots-horizontal' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M16 12a2 2 0 0 1 2-2a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2m-6 0a2 2 0 0 1 2-2a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2m-6 0a2 2 0 0 1 2-2a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2Z"></path></svg>',
                    'dots-vertical' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M12 16a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2a2 2 0 0 1 2-2m0-6a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2a2 2 0 0 1 2-2m0-6a2 2 0 0 1 2 2a2 2 0 0 1-2 2a2 2 0 0 1-2-2a2 2 0 0 1 2-2Z"></path></svg>',
                    'eye' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5Z"></path></svg>',
                    'plus' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2Z"></path></svg>',
                    'pencil' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M20.71 7.04c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.37-.39-1.02-.39-1.41 0l-1.84 1.83l3.75 3.75M3 17.25V21h3.75L17.81 9.93l-3.75-3.75L3 17.25Z"></path></svg>',
                    'delete' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6v12Z"></path></svg>',
                    'content-copy' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19 21H8V7h11m0-2H8a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2m-3-4H4a2 2 0 0 0-2 2v14h2V3h12V1Z"></path></svg>',
                    'content-cut' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="m19 3l-6 6l2 2l7-7V3m-10 9.5a.5.5 0 0 1-.5-.5a.5.5 0 0 1 .5-.5a.5.5 0 0 1 .5.5a.5.5 0 0 1-.5.5M6 20a2 2 0 0 1-2-2a2 2 0 0 1 2-2a2 2 0 0 1 2 2a2 2 0 0 1-2 2M6 8a2 2 0 0 1-2-2a2 2 0 0 1 2-2a2 2 0 0 1 2 2a2 2 0 0 1-2 2m3.64-.36c.23-.5.36-1.05.36-1.64a4 4 0 0 0-4-4a4 4 0 0 0-4 4a4 4 0 0 0 4 4c.59 0 1.14-.13 1.64-.36L10 12l-2.36 2.36C7.14 14.13 6.59 14 6 14a4 4 0 0 0-4 4a4 4 0 0 0 4 4a4 4 0 0 0 4-4c0-.59-.13-1.14-.36-1.64L12 14l7 7h3v-1L9.64 7.64Z"></path></svg>',
                    'content-duplicate' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M11 17H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h12v2H4v12h7v-2l4 3l-4 3v-2m8 4V7H8v6H6V7a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-2h2v2h11Z"></path></svg>',
                    'content-paste' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19 20H5V4h2v3h10V4h2m-7-2a1 1 0 0 1 1 1a1 1 0 0 1-1 1a1 1 0 0 1-1-1a1 1 0 0 1 1-1m7 0h-4.18C14.4.84 13.3 0 12 0c-1.3 0-2.4.84-2.82 2H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2Z"></path></svg>',
                    'content-save' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M15 9H5V5h10m-3 14a3 3 0 0 1-3-3a3 3 0 0 1 3-3a3 3 0 0 1 3 3a3 3 0 0 1-3 3m5-16H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7l-4-4Z"></path></svg>',
                    'send' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="m2 21l21-9L2 3v7l15 2l-15 2v7Z"></path></svg>',
                    'arrow-left' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M20 11v2H8l5.5 5.5l-1.42 1.42L4.16 12l7.92-7.92L13.5 5.5L8 11h12Z"></path></svg>',
                    'arrow-right' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M4 11v2h12l-5.5 5.5l1.42 1.42L19.84 12l-7.92-7.92L10.5 5.5L16 11H4Z"></path></svg>',
                    'arrow-up' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M13 20h-2V8l-5.5 5.5l-1.42-1.42L12 4.16l7.92 7.92l-1.42 1.42L13 8v12Z"></path></svg>',
                    'arrow-down' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M11 4h2v12l5.5-5.5l1.42 1.42L12 19.84l-7.92-7.92L5.5 10.5L11 16V4Z"></path></svg>',
                    'chevron-left' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M15.41 16.58L10.83 12l4.58-4.59L14 6l-6 6l6 6l1.41-1.42Z"></path></svg>',
                    'chevron-right' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M8.59 16.58L13.17 12L8.59 7.41L10 6l6 6l-6 6l-1.41-1.42Z"></path></svg>',
                    'chevron-up' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6l-6 6l1.41 1.41Z"></path></svg>',
                    'chevron-down' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M7.41 8.58L12 13.17l4.59-4.59L18 10l-6 6l-6-6l1.41-1.42Z"></path></svg>',
                    'login' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M10 17v-3H3v-4h7V7l5 5l-5 5m0-15h9a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2h-9a2 2 0 0 1-2-2v-2h2v2h9V4h-9v2H8V4a2 2 0 0 1 2-2Z"></path></svg>',
                    'logout' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M16 17v-3H9v-4h7V7l5 5l-5 5M14 2a2 2 0 0 1 2 2v2h-2V4H5v16h9v-2h2v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9Z"></path></svg>',
                    'download' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M5 20h14v-2H5m14-9h-4V3H9v6H5l7 7l7-7Z"></path></svg>',
                    'filter' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M14 12v7.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0l-2.01-2.01a.989.989 0 0 1-.29-.83V12h-.03L4.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L14.03 12H14Z"></path></svg>',
                    'menu' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M3 6h18v2H3V6m0 5h18v2H3v-2m0 5h18v2H3v-2Z"></path></svg>',
                    'toggler' => '<svg viewBox="0 0 24 24"><path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>',
                    'loading' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M12 4V2A10 10 0 0 0 2 12h2a8 8 0 0 1 8-8Z"></path></svg>',
                    'spinner' => '<svg fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>',
                    'information' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M13 9h-2V7h2m0 10h-2v-6h2m-1-9A10 10 0 0 0 2 12a10 10 0 0 0 10 10a10 10 0 0 0 10-10A10 10 0 0 0 12 2Z"></path></svg>',
                    'alert' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M13 14h-2V9h2m0 9h-2v-2h2M1 21h22L12 2L1 21Z"></path></svg>',
                    'image' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="m8.5 13.5l2.5 3l3.5-4.5l4.5 6H5m16 1V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2Z"></path></svg>',
                    'camera' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M4 4h3l2-2h6l2 2h3a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2m8 3a5 5 0 0 0-5 5a5 5 0 0 0 5 5a5 5 0 0 0 5-5a5 5 0 0 0-5-5m0 2a3 3 0 0 1 3 3a3 3 0 0 1-3 3a3 3 0 0 1-3-3a3 3 0 0 1 3-3Z"></path></svg>',
                    'account' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4Z"></path></svg>',
                    'checkbox-blank-outline' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19 3H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m0 2v14H5V5h14Z"></path></svg>',
                    'checkbox-marked-outline' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="M19 19H5V5h10V3H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-8h-2m-11.09-.92L6.5 11.5L11 16L21 6l-1.41-1.42L11 13.17l-3.09-3.09Z"></path></svg>',
                    'search' => '<svg viewBox="0 0 24 24"><path fill="currentColor" d="m18.9 20.3l-5.6-5.6q-.75.6-1.725.95Q10.6 16 9.5 16q-2.725 0-4.612-1.887Q3 12.225 3 9.5q0-2.725 1.888-4.613Q6.775 3 9.5 3t4.613 1.887Q16 6.775 16 9.5q0 1.1-.35 2.075q-.35.975-.95 1.725l5.625 5.625q.275.275.275.675t-.3.7q-.275.275-.7.275q-.425 0-.7-.275ZM9.5 14q1.875 0 3.188-1.312Q14 11.375 14 9.5q0-1.875-1.312-3.188Q11.375 5 9.5 5Q7.625 5 6.312 6.312Q5 7.625 5 9.5q0 1.875 1.312 3.188Q7.625 14 9.5 14Z"></path></svg>',
                ],
            ],

            /**
             * Layouts.
             */
            'authentication-card' => [
                'html' => [
                    'components' => [
                        'user-sidebar' => [
                            'disabled' => true,
                        ],
                    ],
                ],

                'panels' => [
                    'default' => [],

                    'admin' => [
                        'mix-styles' => [
                            'css/admin.css',
                        ],

                        'mix-scripts' => [
                            'js/admin.js',
                        ],

                        'vite' => [
                            'resources/js/admin.js',
                        ],
                    ],
                ],

                'container' => [
                    'class' => 'min-h-screen flex flex-col items-center pt-6 bg-gray-100',
                ],

                'header' => [],

                'logo' => [
                    'class' => 'p-10',
                ],

                'card' => [
                    'class' => 'w-full sm:max-w-md p-6 sm:p-14 bg-white overflow-hidden shadow rounded',
                ],

                'message' => [],
            ],

            'container' => [
                'container' => [
                    'class' => 'container mx-auto',
                ],
            ],

            'control-panel' => [
                'html' => [
                    'components' => [
                        'user-sidebar' => [
                            'disabled' => true,
                        ],
                    ],
                ],

                'panels' => [
                    'default' => [],

                    'admin' => [
                        'mix-styles' => [
                            'css/admin.css',
                        ],

                        'mix-scripts' => [
                            'js/admin.js',
                        ],

                        'vite' => [
                            'resources/js/admin.js',
                        ],
                    ],
                ],

                'container' => [
                    'class' => 'flex h-screen bg-gray-100',
                ],

                'sidebar' => [],

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
                    'class' => 'p-6 lg:p-10',
                ],

                'message' => [],
            ],

            'display' => [
                'container' => [],

                'img' => [],

                'audio' => [
                    'controls' => true,
                ],

                'video' => [
                    'controls' => true,
                ],

                'download' => [
                    'target' => '_blank',
                ],

                'check' => [
                    'class' => 'fill-current w-6 h-6 text-green-500',
                ],

                'uncheck' => [
                    'class' => 'fill-current w-6 h-6 text-red-500',
                ],
            ],

            'error' => [
                'container' => [
                    'class' => 'justify-center inline-flex items-center space-x-2',
                ],

                'icon' => [
                    'class' => 'fill-current w-4 h-4 text-red-500',
                ],

                'icon-name' => 'times',

                'icon-svg' => [
                    '<svg viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>',
                ],

                'text' => [],
            ],

            'html' => [
                'html' => [
                    'lang' => $lang,
                ],

                'head' => [],

                'body' => [
                    'style' => 'font-family: Nunito;',
                    'class' => 'text-gray-700',
                ],

                'options' => [
                    'turbo' => true,

                    'meta' => [
                        'turbo-cache-control' => 'no-preview',
                    ],

                    'google-fonts' => [
                        'families' => 'Nunito:wght@100;200;300;400;500;600;700;800;900',
                    ],

                    'components' => [
                        'user-sidebar' => [
                            'guard' => 'admin',
                            'target' => '_blank',
                        ],
                    ],
                ],
            ],

            'loading' => [
                'container' => [
                    'class' => 'justify-center inline-flex items-center space-x-2',
                ],

                'icon' => [
                    'class' => 'animate-spin w-4 h-4',
                ],

                'icon-name' => 'spinner',

                'icon-svg' => [
                    '<svg fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>',
                ],

                'text' => [],
            ],

            'logo' => [
                'container' => [
                    'class' => 'flex items-center justify-center',
                ],

                'image' => [
                    'class' => 'mx-auto',
                ],

                'name' => [
                    'class' => 'text-2xl font-semibold',
                ],
            ],

            'meta' => [],

            /**
             * Markdowns.
             */
            'markdown' => [
                'container' => [],
            ],

            'toc' => [
                'container' => [],

                'item' => [],

                'sub' => [],

                'link' => [],
            ],

            /**
             * Menus.
             */
            'menu' => [
                'container' => [
                    'class' => 'bg-white ring-1 ring-black ring-opacity-5 divide-gray-100 rounded shadow',

                    'theme:item' => [
                        'class' => 'hover:bg-gray-100 hover:text-gray-900',

                        'theme:active' => [
                            'class' => 'bg-gray-100 text-gray-900',
                        ],
                    ],
                ],

                'aligns' => [
                    'outline' => [
                        'class' => 'divide-y',
                    ],

                    'inline' => [
                        'class' => 'divide-x',
                    ],
                ],
            ],

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

                'dropdown-aligns' => [
                    'auto' => [
                        'class' => '!static',
                        '@open' => 'alignAuto',
                        '@scroll.window' => 'close',
                        '@resize.window' => 'close',
                    ],
                ],

                'trigger' => [
                    '@click' => 'toggle',
                    'class' => 'bg-white',
                ],
            ],

            'nav' => [
                'container' => [
                    'class' => 'flex overflow-hidden whitespace-nowrap',
                ],

                'aligns' => [
                    'outline' => [
                        'class' => 'flex-col',
                    ],

                    'inline' => [
                        'class' => 'flex-row',
                    ],
                ],

                'li' => [],

                'item' => [
                    'class' => 'w-full',

                    'theme:active' => [
                        'class' => 'font-semibold',
                    ],
                ],
            ],

            'user-menu' => [
                'container' => [],

                'trigger' => [
                    '@click' => 'toggle',

                    'theme:container' => [
                        'theme:text' => [
                            'class' => 'hidden sm:block',
                        ],
                    ],
                ],
            ],

            /**
             * Messages.
             */
            'message' => [
                '_purge' => [
                    'bg-gray-200',
                    'border-gray-300',
                    'bg-gray-100',
                    'border-gray-500',
                    'text-gray-500',
                    'text-gray-600',
                    'text-gray-800',

                    'bg-red-200',
                    'border-red-300',
                    'bg-red-100',
                    'border-red-500',
                    'text-red-500',
                    'text-red-600',
                    'text-red-800',

                    'bg-blue-200',
                    'border-blue-300',
                    'bg-blue-100',
                    'border-blue-500',
                    'text-blue-500',
                    'text-blue-600',
                    'text-blue-800',

                    'bg-yellow-200',
                    'border-yellow-300',
                    'bg-yellow-100',
                    'border-yellow-500',
                    'text-yellow-500',
                    'text-yellow-600',
                    'text-yellow-800',

                    'bg-green-200',
                    'border-green-300',
                    'bg-green-100',
                    'border-green-500',
                    'text-green-500',
                    'text-green-600',
                    'text-green-800',
                ],

                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'message\')',
                    'x-show' => 'isOpened()',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:enter-start' => 'opacity-0',
                    'x-transition:enter-end' => 'opacity-100',
                    'x-transition:leave' => 'ease-in duration-200',
                    'x-transition:leave-start' => 'opacity-100',
                    'x-transition:leave-end' => 'opacity-0',
                    'class' => 'flex flex-row p-4 rounded relative transition mb-4',
                ],

                'icon' => [
                    'class' => 'flex items-center border-2 justify-center h-10 w-10 shrink-0 rounded-full mr-4',
                ],

                'dismissible' => [
                    'button' => [
                        '@click' => 'close',
                        'class' => 'absolute top-0 right-0 transition hover:opacity-75 text-sm',
                    ],

                    'icon-name' => 'close',

                    'icon-svg' => '<svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',
                ],

                'title' => [
                    'class' => 'font-semibold text-lg',
                ],

                'message' => [],

                'types' => [
                    'default' => [
                        'color' => 'gray',
                        'icon-svg' => false,
                        'icon-name' => false,
                        'title' => false,
                    ],

                    'error' => [
                        'color' => 'red',
                        'icon-name' => 'close',
                        'icon-svg' => '<svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>',
                        'title' => 'Error',
                    ],

                    'info' => [
                        'color' => 'blue',
                        'icon-name' => 'information',
                        'icon-svg' => '<svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>',
                        'title' => 'Info',
                    ],

                    'success' => [
                        'color' => 'green',
                        'icon-name' => 'check',
                        'icon-svg' => '<svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>',
                        'title' => 'Success',
                    ],

                    'warning' => [
                        'color' => 'yellow',
                        'icon-name' => 'alert',
                        'icon-svg' => '<svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>',
                        'title' => 'Warning',
                    ],

                    'created' => [
                        'color' => 'green',
                        'icon-name' => 'check',
                        'icon-svg' => '<svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>',
                        'title' => 'Created',
                        'message' => 'Record created successfully!',
                        'dismissible' => true,
                        'timeout' => 3000,
                    ],

                    'updated' => [
                        'color' => 'blue',
                        'icon-name' => 'check',
                        'icon-svg' => '<svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>',
                        'title' => 'Updated',
                        'message' => 'Record updated successfully!',
                        'dismissible' => true,
                        'timeout' => 3000,
                    ],

                    'deleted' => [
                        'color' => 'red',
                        'icon-name' => 'check',
                        'icon-svg' => '<svg class="w-6 h-6 fill-current" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>',
                        'title' => 'Deleted',
                        'message' => 'Record deleted successfully!',
                        'dismissible' => true,
                        'timeout' => 3000,
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
            ],

            /**
             * Overlays.
             */
            'cookie-consent' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'cookie-consent\')',
                ],

                'modal' => [
                    'theme:box.except.@keydown.escape.window' => 'true',
                    'theme:box.except.@keydown.tab.prevent' => 'true',
                    'theme:box.except.@keydown.shift.tab.prevent' => 'true',
                    'class' => 'border p-4',
                ],

                'section' => [],

                'content' => [
                    'class' => 'mb-2',
                ],

                'link' => [
                    'class' => 'underline',
                ],

                'button' => [],
            ],

            'drawer' => [
                'container' => [],

                'drawer' => [
                    'x-show' => 'isOpened()',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:leave' => 'ease-in duration-200',
                    'class' => 'fixed transform transition',
                ],

                'aligns' => [
                    'left' => [
                        'x-transition:enter-start' => '-translate-x-full',
                        'x-transition:enter-end' => 'translate-x-0',
                        'x-transition:leave-start' => 'translate-x-0',
                        'x-transition:leave-end' => '-translate-x-full',
                        'class' => 'h-full top-0 bottom-0 left-0 overflow-y-auto',
                    ],

                    'right' => [
                        'x-transition:enter-start' => 'translate-x-full',
                        'x-transition:enter-end' => 'translate-x-0',
                        'x-transition:leave-start' => 'translate-x-0',
                        'x-transition:leave-end' => 'translate-x-full',
                        'class' => 'h-full top-0 bottom-0 right-0 overflow-y-auto',
                    ],

                    'top' => [
                        'x-transition:enter-start' => '-translate-y-full',
                        'x-transition:enter-end' => 'translate-y-0',
                        'x-transition:leave-start' => 'translate-y-0',
                        'x-transition:leave-end' => '-translate-y-full',
                        'class' => 'w-full top-0 left-0 right-0 overflow-x-auto',
                    ],

                    'bottom' => [
                        'x-transition:enter-start' => 'translate-y-full',
                        'x-transition:enter-end' => 'translate-y-0',
                        'x-transition:leave-start' => 'translate-y-0',
                        'x-transition:leave-end' => 'translate-y-full',
                        'class' => 'w-full bottom-0 left-0 right-0 overflow-x-auto',
                    ],
                ],
            ],

            'dropdown' => [
                'trigger' => [
                    '@click' => 'toggle',
                    'class' => 'cursor-pointer',
                ],

                'dropdown' => [
                    'x-ref' => 'dropdown',
                    'x-show' => 'isOpened()',
                    'x-transition:enter' => 'transition ease-out duration-300',
                    'x-transition:enter-start' => 'transform opacity-0 scale-95',
                    'x-transition:enter-end' => 'transform opacity-100 scale-100',
                    'x-transition:leave' => 'transition ease-in duration-200',
                    'x-transition:leave-start' => 'transform opacity-100 scale-100',
                    'x-transition:leave-end' => 'transform opacity-0 scale-95',
                    '@click.away' => 'close',
                    '@click.outside' => 'close',
                    '@keydown.escape.window' => 'close',
                    'class' => 'absolute',
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

            'modal' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'modal\')',
                ],

                'trigger' => [
                    '@click' => 'toggle',
                    'class' => 'inline-block cursor-pointer',
                ],

                'box' => [
                    'x-show' => 'isOpened()',
                    '@close.stop' => 'close',
                    '@keydown.escape.window' => 'close',
                    '@keydown.tab.prevent' => '$event.shiftKey || nextFocusable().focus()',
                    '@keydown.shift.tab.prevent' => 'prevFocusable().focus()',
                    'class' => 'fixed inset-0 z-50 p-4 flex',
                ],

                'aligns' => [
                    'left' => [
                        'class' => 'items-center justify-start',
                    ],

                    'right' => [
                        'class' => 'items-center justify-end',
                    ],

                    'top' => [
                        'class' => 'items-start justify-center',
                    ],

                    'top-left' => [
                        'class' => 'items-start justify-start',
                    ],

                    'top-right' => [
                        'class' => 'items-start justify-end',
                    ],

                    'center' => [
                        'class' => 'items-center justify-center',
                    ],

                    'bottom' => [
                        'class' => 'items-end justify-center',
                    ],

                    'bottom-left' => [
                        'class' => 'items-end justify-start',
                    ],

                    'bottom-right' => [
                        'class' => 'items-end justify-end',
                    ],
                ],

                'modal' => [
                    'x-show' => 'isOpened()',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:leave' => 'ease-in duration-200',
                    'class' => 'flex-initial bg-white overflow-hidden rounded shadow transform transition w-full',
                ],

                'transitions' => [
                    'opacity' => [
                        'x-transition:enter-start' => 'opacity-0',
                        'x-transition:enter-end' => 'opacity-100',
                        'x-transition:leave-start' => 'opacity-100',
                        'x-transition:leave-end' => 'opacity-0',
                    ],

                    'left' => [
                        'x-transition:enter-start' => '-translate-x-full',
                        'x-transition:enter-end' => 'translate-x-0',
                        'x-transition:leave-start' => 'translate-x-0',
                        'x-transition:leave-end' => '-translate-x-full',
                    ],

                    'right' => [
                        'x-transition:enter-start' => 'translate-x-full',
                        'x-transition:enter-end' => 'translate-x-0',
                        'x-transition:leave-start' => 'translate-x-0',
                        'x-transition:leave-end' => 'translate-x-full',
                    ],

                    'top' => [
                        'x-transition:enter-start' => '-translate-y-full',
                        'x-transition:enter-end' => 'translate-y-0',
                        'x-transition:leave-start' => 'translate-y-0',
                        'x-transition:leave-end' => '-translate-y-full',
                    ],

                    'bottom' => [
                        'x-transition:enter-start' => 'translate-y-full',
                        'x-transition:enter-end' => 'translate-y-0',
                        'x-transition:leave-start' => 'translate-y-0',
                        'x-transition:leave-end' => 'translate-y-full',
                    ],
                ],
            ],

            'overlay' => [
                'container' => [
                    'x-cloak' => '',
                    'x-show' => 'isOpened()',
                    'x-transition:enter' => 'ease-out duration-300',
                    'x-transition:enter-start' => 'opacity-0',
                    'x-transition:enter-end' => 'opacity-100',
                    'x-transition:leave' => 'ease-in duration-200',
                    'x-transition:leave-start' => 'opacity-100',
                    'x-transition:leave-end' => 'opacity-0',
                    'class' => 'fixed inset-0 transform transition',
                ],

                'closeable' => [
                    '@click' => 'close(false)',
                    'class' => 'cursor-pointer',
                ],

                'backdrop' => [
                    'class' => 'absolute inset-0 bg-gray-500 opacity-70',
                ],
            ],

            'toggleable' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'toggleable\')',
                    '@keydown.escape.window' => 'close(false)',
                    ':class' => '{\'z-30\': isOpened()}',
                    'class' => 'relative',
                ],
            ],

            'tooltip' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,tooltip',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'tooltip\')',
                    'class' => 'inline-block',
                ],

                'options' => [
                    // See https://atomiks.github.io/tippyjs/v6/all-props/
                ],
            ],

            /**
             * Panels.
             */
            'accordion' => [
                'container' => [
                    'class' => 'border',
                ],
            ],

            'accordion-item' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'accordion-item\')',
                    'class' => 'border-b',
                ],

                'trigger' => [
                    '@click' => 'toggle',
                    'class' => 'w-full text-left py-2 px-3 cursor-pointer',
                ],

                'disabled' => [
                    'class' => 'cursor-not-allowed',
                    'disabled' => true,
                ],

                'item' => [
                    'x-ref' => 'container',
                    ':style' => 'style()',
                    'class' => 'overflow-hidden transition-all max-h-0 duration-500',
                ],

                'content' => [
                    'class' => 'py-2 px-3',
                ],
            ],

            'card' => [
                'container' => [
                    'class' => 'bg-white shadow rounded',
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

                'text' => [],

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

                'actions' => [
                    'class' => 'shrink-0',
                ],
            ],

            'tab' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'tab\')',
                ],

                'heading' => [
                    'class' => 'flex',
                    'role' => 'tablist',
                ],

                'item' => [
                    'x-html' => 'tab.header',
                    '@click' => 'setSelected(tab)',
                    'role' => 'tab',
                ],

                'selected' => [],

                'disabled' => [
                    'class' => 'cursor-not-allowed',
                ],

                'tabs' => [
                    'x-ref' => 'tabs',
                ],

                'tab-item' => [
                    'x-show' => 'isSelected(tab)',
                    'x-html' => 'tab.content',
                ],

                'modes-item' => [
                    'default' => [],

                    'border' => [],
                ],

                'modes-selected' => [
                    'default' => [
                        'class' => 'border-b-2 bg-white border-gray-500',
                    ],

                    'border' => [
                        'class' => 'border border-b-0 bg-white rounded-t',
                    ],
                ],

                'modes-disabled' => [
                    'default' => [],

                    'border' => [],
                ],

                'modes-tabs' => [
                    'default' => [
                        'class' => '-mt-px border-t',
                    ],

                    'border' => [
                        'class' => '-mt-px border rounded-b',
                    ],
                ],
            ],

            'tab-item' => [
                'container' => [
                    'class' => 'p-4',
                    'role' => 'tabpanel',
                ],
            ],

            /**
             * Pickers.
             */
            'flatpickr' => [
                'flatpickr' => [
                    'data-tallkit-assets' => 'alpine,flatpickr',
                    'wire:ignore' => '',
                    'x-data' => 'window.tallkit.component(\'flatpickr\')',
                    'x-ref' => 'input',
                    'autocomplete' => 'off',
                ],

                'options' => [
                    // See https://flatpickr.js.org/options/
                    'enableTime' => true,
                ],
            ],

            'pickr' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,pickr',
                    'wire:ignore' => '',
                    'x-data' => 'window.tallkit.component(\'pickr\')',
                ],

                'input' => [
                    'x-ref' => 'input',
                ],

                'pickr' => [
                    'x-ref' => 'picker',
                ],

                'options' => [
                    // See https://github.com/Simonwep/pickr#options
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
                    'wire:ignore' => '',
                    'x-data' => 'window.tallkit.component(\'pikaday\')',
                    'x-ref' => 'input',
                    'autocomplete' => 'off',
                ],

                'options' => [
                    // See https://github.com/Pikaday/Pikaday#configuration
                ],
            ],

            /**
             * Sliders.
             */
            'flickity' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,flickity',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'flickity\')',
                ],

                'options' => [
                    // See https://flickity.metafizzy.co/options.html
                ],
            ],

            'flickity-item' => [
                'container' => [],
            ],

            'slider' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'slider\')',
                    '@mouseenter' => 'onMouseEnter',
                    '@mouseleave' => 'onMouseLeave',
                    'class' => 'relative',
                ],

                'options' => [
                    'selected' => 0,
                    'loop' => false,
                    'autoplay' => false,
                    'interval' => 10,
                    'controls' => true,
                    'paginator' => true,
                    'progressbar' => false,
                    'stopOnOver' => false,
                ],

                'slider' => [
                    'x-ref' => 'slider',
                    'class' => 'snap-mandatory snap-x scroll-smooth overflow-hidden relative flex-no-wrap flex transition-all',
                ],

                'prev' => [
                    '@click' => 'prev',
                    ':class' => 'prevClass()',
                    'class' => 'absolute top-0 left-0 h-full opacity-50 hover:opacity-100 z-20',
                ],

                'prev-icon' => [
                    'class' => 'w-6 h-6',
                ],

                'prev-icon-name' => 'chevron-left',

                'prev-icon-svg' => [
                    '<svg viewBox="0 0 320 512"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path></svg>',
                ],

                'next' => [
                    '@click' => 'next',
                    ':class' => 'nextClass()',
                    'class' => 'absolute top-0 right-0 h-full opacity-50 hover:opacity-100 z-20',
                ],

                'next-icon' => [
                    'class' => 'w-6 h-6',
                ],

                'next-icon-name' => 'chevron-right',

                'next-icon-svg' => [
                    '<svg viewBox="0 0 320 512"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path></svg>',
                ],

                'paginator' => [
                    'x-show' => 'hasPaginator()',
                    'class' => 'p-4 flex items-center justify-center space-x-2 absolute bottom-0 w-full z-10',
                ],

                'page' => [
                    '@click' => 'go(index)',
                    ':class' => '{ \'bg-opacity-100\': is(index) }',
                    'class' => 'bg-opacity-25 !p-2',
                ],

                'progressbar' => [
                    'x-show' => 'hasProgressbar()',
                    ':style' => 'progressbarStyle()',
                    'class' => 'bg-gray-100 h-2 max-w-full',
                ],
            ],

            'slider-item' => [
                'container' => [
                    'class' => 'w-full shrink-0 snap-center',
                ],
            ],

            'splide' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,splide',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'splide\')',
                    'class' => 'splide',
                ],

                'options' => [
                    // See https://splidejs.com/options/
                ],

                'slider' => [
                    'class' => 'splide__slider',
                ],

                'track' => [
                    'class' => 'splide__track',
                ],

                'list' => [
                    'class' => 'splide__list',
                ],
            ],

            'splide-item' => [
                'container' => [
                    'class' => 'splide__slide',
                ],
            ],

            'swiper' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,swiper',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'swiper\')',
                    'class' => 'swiper',
                ],

                'options' => [
                    // See https://swiperjs.com

                    'pagination' => [
                        'el' => '.swiper-pagination',
                    ],

                    'navigation' => [
                        'nextEl' => '.swiper-button-next',
                        'prevEl' => '.swiper-button-prev',
                    ],

                    'scrollbar' => [
                        'el' => '.swiper-scrollbar',
                    ],
                ],

                'wrapper' => [
                    'class' => 'swiper-wrapper',
                ],

                'pagination' => [
                    'class' => 'swiper-pagination',
                ],

                'button-prev' => [
                    'class' => 'swiper-button-prev',
                ],

                'button-next' => [
                    'class' => 'swiper-button-next',
                ],

                'scrollbar' => [
                    'class' => 'swiper-scrollbar',
                ],
            ],

            'swiper-item' => [
                'container' => [
                    'class' => 'swiper-slide',
                ],
            ],

            /**
             * Supports.
             */
            'avatar' => [
                'container' => [
                    'theme:iconName' => [
                        'user',
                    ],

                    'theme:iconSvg' => [
                        '<svg class="fill-current" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>',
                    ],
                ],
            ],

            'cron' => [
                'container' => [],
            ],

            'fetchable' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'fetchable\')',
                    'class' => 'flex flex-col',
                ],

                'content' => [
                    'class' => 'flex-1',
                ],

                'empty' => [
                    'x-show' => 'isEmpty()',
                ],

                'loading' => [
                    'x-show' => 'isLoading()',
                ],

                'completed' => [
                    'x-show' => 'isCompleted()',
                ],

                'error' => [
                    'x-show' => 'isFailed()',
                    'theme:text' => [
                        'x-text' => 'error',
                    ],
                ],

                'options' => [
                    'method' => 'get',
                    'headers' => ['Accept' => 'application/json'],
                    'responseType' => 'json',
                ],
            ],

            'image-loader' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'image-loader\')',
                    'x-init' => 'setup',
                ],

                'image' => [
                    'x-show' => 'isCompleted()',
                    'x-ref' => 'image',
                ],

                'icon' => [
                    'x-show' => 'isLoading() || isFailed()',
                ],

                'icon-name' => [
                    'image',
                ],

                'icon-svg' => [
                    '<svg class="fill-current" viewBox="0 0 512 512"><path fill="currentColor" d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm-6 336H54a6 6 0 0 1-6-6V118a6 6 0 0 1 6-6h404a6 6 0 0 1 6 6v276a6 6 0 0 1-6 6zM128 152c-22.091 0-40 17.909-40 40s17.909 40 40 40 40-17.909 40-40-17.909-40-40-40zM96 352h320v-80l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L192 304l-39.515-39.515c-4.686-4.686-12.284-4.686-16.971 0L96 304v48z"></path></svg>',
                ],

                'loading' => [
                    'x-show' => 'isLoading()',
                    'theme:icon' => [
                        'class' => 'w-full h-full',
                    ],
                ],

                'error' => [
                    'x-show' => 'isFailed()',
                    'theme:icon' => [
                        'class' => 'w-full h-full',
                    ],
                ],
            ],

            'unsplash' => [
                'container' => [],
            ],

            /**
             * Tables.
             */
            'cell' => [
                'td' => [
                    'class' => 'px-6 py-4 whitespace-nowrap text-gray-500',
                ],

                'container' => [],

                'aligns' => [
                    'left' => [
                        'class' => 'text-left',
                    ],

                    'center' => [
                        'class' => 'text-center',
                    ],

                    'right' => [
                        'class' => 'text-right',
                    ],
                ],
            ],

            'datatable' => [
                'container' => [],

                'search' => [
                    'class' => 'mb-4',
                ],

                'search-fields' => [
                    'class' => 'grid grid-cols-1 gap-x-4',
                ],

                'search-cols' => [
                    '1' => [
                        'class' => 'md:grid-cols-1',
                    ],

                    '2' => [
                        'class' => 'md:grid-cols-2',
                    ],

                    '3' => [
                        'class' => 'md:grid-cols-3',
                    ],

                    '4' => [
                        'class' => 'md:grid-cols-4',
                    ],

                    '5' => [
                        'class' => 'md:grid-cols-5',
                    ],

                    '6' => [
                        'class' => 'md:grid-cols-6',
                    ],
                ],

                'search-submit' => [
                    'class' => 'col-span-full',
                ],

                'table' => [],
            ],

            'heading' => [
                'th' => [
                    'class' => 'bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider',
                    'scope' => 'col',
                ],

                'container' => [
                    'class' => 'flex items-center py-4 px-6',
                ],

                'aligns' => [
                    'left' => [
                        'class' => 'justify-start',
                    ],

                    'center' => [
                        'class' => 'justify-center',
                    ],

                    'right' => [
                        'class' => 'justify-end',
                    ],
                ],

                'sortable' => [
                    'asc' => [
                        'icon-name' => 'chevron-up',
                        'icon-svg' => '<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z" /></svg>',
                    ],

                    'desc' => [
                        'icon-name' => 'chevron-down',
                        'icon-svg' => '<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" /></svg>',
                    ],
                ],
            ],

            'row' => [
                'tr' => [],
            ],

            'table' => [
                'container' => [
                    'class' => 'shadow rounded overflow-y-auto border-b border-gray-200 my-4',
                ],

                'table' => [
                    'class' => 'min-w-full divide-y divide-gray-200',
                ],

                'thead' => [],

                'th' => [],

                'tbody' => [
                    'class' => 'bg-white divide-y divide-gray-200',
                ],

                'tr' => [],

                'td' => [],

                'tfoot' => [],

                'empty-text' => [
                    'class' => 'px-6 py-4 whitespace-nowrap text-lg text-gray-500 text-center',
                ],

                'display' => [
                    'theme:img' => [
                        'class' => 'mx-auto max-w-xs max-h-40',
                    ],

                    'theme:audio' => [
                        'class' => 'mx-auto max-w-xs max-h-40',
                    ],

                    'theme:video' => [
                        'class' => 'mx-auto max-w-xs max-h-40',
                    ],

                    'theme:check' => [
                        'class' => 'mx-auto',
                    ],

                    'theme:uncheck' => [
                        'class' => 'mx-auto',
                    ],
                ],
            ],

            /**
             * Uploaders.
             */
            'dropzone' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine,dropzone',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'dropzone\')',
                ],

                'loading' => [
                    'x-show' => 'isLoading()',
                    'class' => 'mb-4 w-full py-2 px-3 bg-white border border-gray-200 bg-white rounded shadow',
                ],

                'dropzone' => [
                    ':class' => '{\'invisible\': !isCompleted()}',
                    'x-ref' => 'dropzone',
                    'class' => 'dropzone',
                ],

                'options' => [
                    // See https://docs.dropzone.dev/configuration/basics/configuration-options
                ],
            ],

            'filepond' => [
                'container' => [
                    'data-tallkit-assets' => 'alpine',
                    'wire:ignore' => '',
                    'x-cloak' => '',
                    'x-data' => 'window.tallkit.component(\'filepond\')',
                ],

                'loading' => [
                    'x-show' => 'isLoading()',
                    'class' => 'mb-4 w-full py-2 px-3 bg-white border border-gray-200 bg-white rounded shadow',
                ],

                'filepond' => [
                    'x-ref' => 'filepond',

                    'theme:container' => [
                        ':class' => '{\'invisible\': !isCompleted()}',
                    ],
                ],

                'options' => [
                    // See https://pqina.nl/filepond/docs/api/instance/properties/

                    'plugins' => [
                        // See https://pqina.nl/filepond/docs/api/plugins/
                    ],
                ],
            ],
        ],
    ],
];
