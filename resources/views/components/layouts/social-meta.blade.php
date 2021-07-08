@if ($card)
    <meta name="twitter:card" content="{{ $card }}" />
@endif

@if ($type)
    <meta property="og:type" content="{{ $type }}">
@endif

@if ($title)
    <meta property="og:title" content="{{ $title }}" />
@endif

@if ($description)
    <meta name="description" content="{{ $description }}">
    <meta property="og:description" content="{{ $description }}">
@endif

@if ($image)
    <meta property="og:image" content="{{ $image }}" />
@endif

@if ($url)
    <meta property="og:url" content="{{ $url }}" />
@endif

@if ($locale)
    <meta property="og:locale" content="{{ $locale }}" />
@endif
