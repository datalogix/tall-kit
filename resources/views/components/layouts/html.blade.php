<!DOCTYPE html>
<html {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'html') }}>
<head {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'head') }}>
    <meta charset="{{ $charset }}">
    @if ($viewport) <meta name="viewport" content="{{ $viewport }}"> @endif
    @if ($csrfToken) <meta name="csrf-token" content="{{ csrf_token() }}"> @endif
    @if ($googleFonts) <x-google-fonts family="{{ $googleFonts }}" /> @endif
    <title>{{ __($title) }}</title>
    {{ $head ?? '' }}
    @if ($turbo) <x-turbo /> @endif
    @if ($googleAnalytics) <x-google-analytics id="{{ $googleAnalytics }}" /> @endif
    @if ($googleTagManager) <x-google-tag-manager id="{{ $googleTagManager }}" /> @endif
    @if ($facebookPixelCode) <x-facebook-pixel-code id="{{ $facebookPixelCode }}" /> @endif
    @if ($livewire) @livewireStyles @endif
    @if (is_array($tallkit)) @tallkitStyles($tallkit) @endif
    @if ($mixStyles) <link href="{{ mix($mixStyles) }}" rel="stylesheet"> @endif
    @foreach ($styles as $style) <link href="{{ $style }}" rel="stylesheet"> @endforeach
    @if ($stackStyles) @stack($stackStyles) @endif
</head>
<body {{ $attributes->mergeThemeProvider($themeProvider, 'body') }}>
    @if ($googleTagManager) <x-google-tag-manager id="{{ $googleTagManager }}" noscript /> @endif
    @if ($facebookPixelCode) <x-facebook-pixel-code id="{{ $facebookPixelCode }}" noscript /> @endif
    {{ $slot }}
    @if ($livewire) @livewireScripts @endif
    @if ($livewire && $turbo) <x-turbo livewire /> @endif
    @if (is_array($tallkit)) @tallkitScripts($tallkit) @endif
    @if ($mixScripts) <script src="{{ mix($mixScripts) }}" data-turbo-eval="false" data-turbolinks-eval="false"></script> @endif
    @foreach ($scripts as $script) <script src="{{ $script }}" data-turbo-eval="false" data-turbolinks-eval="false"></script> @endforeach
    @if ($stackScripts) @stack($stackScripts) @endif
</body>
</html>
