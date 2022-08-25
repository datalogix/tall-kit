<!DOCTYPE html>
<html {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'html') }}>
<head {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'head') }}>
    <meta charset="{{ $charset }}">

    @if ($viewport)
        <meta name="viewport" content="{{ $viewport }}">
    @endif

    @if ($csrfToken)
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endif

    @foreach ($meta as $metaName => $metaContent)
        <meta name="{{ $metaName }}" content="{{ $metaContent }}">
    @endforeach

    @if ($googleFonts)
        <x-google-fonts
            :families="data_get($googleFonts, 'families', $googleFonts)"
            :display="data_get($googleFonts, 'display')"
            :prefetch="data_get($googleFonts, 'prefetch')"
            :preconnect="data_get($googleFonts, 'preconnect')"
            :preload="data_get($googleFonts, 'preload')"
            :use-stylesheet="data_get($googleFonts, 'use-stylesheet')"
            :noscript="false"
        />
    @endif

    <title>{{ __($title) ?? config('app.name') }}</title>

    {{ $head ?? '' }}

    @if ($turbo)
        <x-turbo />
    @endif

    @if ($googleAnalytics)
        <x-google-analytics :id="$googleAnalytics" />
    @endif

    @if ($googleTagManager)
        <x-google-tag-manager :id="$googleTagManager" />
    @endif

    @if ($facebookPixelCode)
        <x-facebook-pixel-code :id="$facebookPixelCode" />
    @endif

    @if ($livewire)
        @livewireStyles
    @endif

    @if (is_array($tallkit))
        @tallkitStyles($tallkit)
    @endif

    @foreach ($mixStyles as $mixStyle)
        <link href="{{ mix($mixStyle) }}" rel="stylesheet">
    @endforeach

    @foreach ($styles as $style)
        <link href="{{ $style }}" rel="stylesheet">
    @endforeach

    @if ($stackStyles)
        @stack($stackStyles)
    @endif

    @if (file_exists(base_path('vite.config.js')) || file_exists(base_path('vite.config.ts')))
        @vite($vite)
    @endif
</head>
<body {{ $attributes->mergeThemeProvider($themeProvider, 'body') }}>
    @if ($googleFonts)
        <x-google-fonts
            :families="data_get($googleFonts, 'families', $googleFonts)"
            :display="data_get($googleFonts, 'display')"
            :prefetch="data_get($googleFonts, 'prefetch')"
            :preconnect="data_get($googleFonts, 'preconnect')"
            :preload="data_get($googleFonts, 'preload')"
            :use-stylesheet="data_get($googleFonts, 'use-stylesheet')"
            :noscript="true"
        />
    @endif

    @if ($googleTagManager)
        <x-google-tag-manager :id="$googleTagManager" noscript />
    @endif

    @if ($facebookPixelCode)
        <x-facebook-pixel-code :id="$facebookPixelCode" noscript />
    @endif

    {{ $slot }}

    @foreach ($components as $component => $attrs)
        <x-dynamic-component {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'components')
                ->merge($attrs)
            }}
            :component="$component"
        />
    @endforeach

    @if ($livewire)
        @livewireScripts
    @endif

    @if ($livewire && $turbo)
        <x-turbo livewire />
    @endif

    @if (is_array($tallkit))
        @tallkitScripts($tallkit)
    @endif

    @foreach ($mixScripts as $mixScript)
        <script
            src="{{ mix($mixScript) }}"
            data-turbo-eval="false"
            data-turbolinks-eval="false"
        ></script>
    @endforeach

    @foreach ($scripts as $script)
        <script
            src="{{ $script }}"
            data-turbo-eval="false"
            data-turbolinks-eval="false"
        ></script>
    @endforeach

    @if ($stackScripts)
        @stack($stackScripts)
    @endif
</body>
</html>
