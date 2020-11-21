<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ $themeProvider->html }}>
<head {{ $themeProvider->head }}>
    <meta charset="{{ $charset }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?: config('app.name') }}</title>
    {{ $head ?? '' }}

    @if($stackStyles)
        @stack($stackStyles)
    @endif
</head>
<body {{ $attributes->merge($themeProvider->body->toArray()) }}>
    {{ $slot }}

    @if($stackScripts)
        @stack($stackScripts)
    @endif
</body>
</html>
