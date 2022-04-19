@if ($noscript)
    <noscript><link rel="stylesheet" href="{{ $url }}" /></noscript>
@else
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preload" as="style" href="{{ $url }}" />
    <link rel="stylesheet" href="{{ $url }}" media="print" onload="this.media='all'" />
@endif
