<div {{ $themeProvider->container }}>
    <button {{ $attributes->merge($attrs->toArray()) }} type="{{ $type }}">
        {{ $slot->isEmpty() ? __($text) : $slot }}
    </button>
</div>
