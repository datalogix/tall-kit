<div {{ $themeProvider->container }}>
    <button {{ $attributes->merge(toArray($attrs)) }} type="{{ $type }}">
        {{ $slot->isEmpty() ? __($text) : $slot }}
    </button>
</div>
