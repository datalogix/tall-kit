<!DOCTYPE html>
<html {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'html') }}>
<head {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'head') }}>
    <meta charset="{{ $charset }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __($title) }}</title>
    {{ $head ?? '' }}
    @if ($livewire) @livewireStyles @endif
    @if (is_array($tallkit)) @tallkitStyles($tallkit) @endif
    @if ($stackStyles) @stack($stackStyles) @endif
</head>
<body {{ $attributes->mergeThemeProvider($themeProvider, 'body') }}>
    {{ $slot }}
    @if ($livewire) @livewireScripts @endif
    @if (is_array($tallkit)) @tallkitScripts($tallkit) @endif
    @if ($stackScripts) @stack($stackScripts) @endif
</body>
</html>
