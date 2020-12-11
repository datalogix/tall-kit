<div {{ $themeProvider->container }}>
    <button {{ $attributes->merge(toArray($themeProvider->button)) }} type="{{ $type }}">
        {{ $slot->isEmpty() ? __($text) : $slot }}
    </button>
</div>
