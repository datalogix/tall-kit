<!DOCTYPE html>
<html {{ $attr('html') }}>
<head {{ $attr('head') }}>
    <meta charset="{{ $charset }}">

    @if ($viewport)
        <meta name="viewport" content="{{ $viewport }}">
    @endif

    @if ($csrfToken)
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endif

    @if ($meta)
        <x-tallkit-meta :attributes="$attr('meta')->merge(is_array($meta) ? $meta : [])" />
    @endif

    @foreach ($metaTags as $metaName => $metaContent)
        <meta name="{{ $metaName }}" content="{{ $metaContent }}">
    @endforeach

    @if ($googleFonts)
        <x-tallkit-google-fonts :attributes="$attr('googleFonts')->merge($googleFonts)->attr('noscript', false)" />
    @endif

    <title>{{ $title ?? config('app.name') }}</title>

    {{ $head ?? '' }}

    @if ($googleAnalytics)
        <x-tallkit-google-analytics :id="$googleAnalytics" />
    @endif

    @if ($googleTagManager)
        <x-tallkit-google-tag-manager :id="$googleTagManager" />
    @endif

    @if ($facebookPixelCode)
        <x-tallkit-facebook-pixel-code :id="$facebookPixelCode" />
    @endif

    @if ($livewire)
        @livewireStyles
    @endif

    @if (is_array($tallkit))
        @tallkitHead($tallkit)
    @endif

    @if ($typekit)
        <link href="https://use.typekit.net/{{ $typekit }}.css" rel="stylesheet">
    @endif

    @foreach ($styles as $style)
        <link href="{{ $style }}" rel="stylesheet">
    @endforeach

    @if ($stackStyles)
        @stack($stackStyles)
    @endif

    @if (Vite::isRunningHot() || !is_null(Vite::manifestHash($viteBuildDirectory)))
        @vite($vite, $viteBuildDirectory)
    @endif
</head>
<body {{ $attr('body', true) }}>
    @if ($googleFonts)
        <x-tallkit-google-fonts :attributes="$attr('googleFonts')->merge($googleFonts)->attr('noscript', true)" />
    @endif

    @if ($googleTagManager)
        <x-tallkit-google-tag-manager :id="$googleTagManager" noscript />
    @endif

    @if ($facebookPixelCode)
        <x-tallkit-facebook-pixel-code :id="$facebookPixelCode" noscript />
    @endif

    {{ $slot }}

    @foreach ($components as $component => $componentAttrs)
        <x-dynamic-component
            :attributes="$attr('components')->merge($componentAttrs)"
            :component="$component"
        />
    @endforeach

    @if ($livewire)
        @livewireScripts
    @endif

    @if (is_array($tallkit))
        @tallkitScripts($tallkit)
    @endif

    @foreach ($scripts as $script)
        <script src="{{ $script }}"></script>
    @endforeach

    @if ($stackScripts)
        @stack($stackScripts)
    @endif
</body>
</html>
