<div {{ $attrs() }}>
    <template data-header>
        {{ $header ?? $name ?? __('Tab name') }}
    </template>

    {{ $slot }}
</div>
