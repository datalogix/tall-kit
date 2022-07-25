@if ($noscript && !$useStylesheet)
    <noscript><link rel="stylesheet" href="{!! $url !!}" /></noscript>
@endif

@if (!$noscript)
    @if ($prefetch)
        <link rel="dns-prefetch" href="https://fonts.gstatic.com/" />
    @endif

    @if ($preconnect)
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
    @endif

    @if ($preload)
        <link rel="preload" as="style" href="{!! $url !!}" />
    @endif

    @if ($useStylesheet)
        <link rel="stylesheet" href="{!! $url !!}" />
    @else
        <script>var l=document.createElement('link');l.rel='stylesheet';l.href='{!! $url !!}';document.querySelector("head").appendChild(l);</script>
    @endif
@endif
