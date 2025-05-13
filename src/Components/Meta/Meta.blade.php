@if ($title) <meta name="title" content="{{ $title }}"> @endif
@if ($description) <meta name="description" content="{{ $description }}"> @endif
@if ($keywords) <meta name="keywords" content="{{ $keywords }}"> @endif
@if ($author) <meta name="author" content="{{ $author }}"> @endif
@if ($robots) <meta name="robots" content="{{ $robots }}"> @endif

{{-- Open Graph / Facebook --}}
@if ($type) <meta property="og:type" content="{{ $type }}"> @endif
@if ($url) <meta property="og:url" content="{{ $url }}"> @endif
@if ($locale) <meta property="og:locale" content="{{ $locale }}"> @endif
@if ($title) <meta property="og:title" content="{{ $title }}"> @endif
@if ($description) <meta property="og:description" content="{{ $description }}"> @endif
@if ($image) <meta property="og:image" content="{{ $image }}"> @endif

{{--  Twitter --}}
@if ($card) <meta name="twitter:card" content="{{ $card }}"> @endif
@if ($url) <meta name="twitter:url" content="{{ $url }}"> @endif
@if ($title) <meta name="twitter:title" content="{{ $title }}"> @endif
@if ($description) <meta name="twitter:description" content="{{ $description }}"> @endif
@if ($image) <meta name="twitter:image" content="{{ $image }}"> @endif
