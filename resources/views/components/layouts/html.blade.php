<!DOCTYPE html>
<html {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'html') }}>
<head {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'head') }}>
    <meta charset="{{ $charset }}">
    @if ($viewport) <meta name="viewport" content="{{ $viewport }}"> @endif
    @if ($csrfToken) <meta name="csrf-token" content="{{ csrf_token() }}"> @endif
    @if ($googleFonts) <x-google-fonts family="{{ $googleFonts }}" /> @endif
    <title>{{ __($title) }}</title>
    {{ $head ?? '' }}
    @if ($livewire) @livewireStyles @endif
    @if (is_array($tallkit)) @tallkitStyles($tallkit) @endif
    @if ($mixStyles) <link href="{{ mix($mixStyles) }}" rel="stylesheet"> @endif
    @if ($stackStyles) @stack($stackStyles) @endif
</head>
<body {{ $attributes->mergeThemeProvider($themeProvider, 'body') }}>
    {{ $slot }}
    @if ($livewire) @livewireScripts @endif
    @if (is_array($tallkit)) @tallkitScripts($tallkit) @endif
    @if ($mixScripts) <script src="{{ mix($mixScripts) }}"></script> @endif
    @if ($stackScripts) @stack($stackScripts) @endif
</body>
</html>
