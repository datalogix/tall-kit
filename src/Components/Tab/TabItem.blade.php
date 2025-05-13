<div {{ $attr() }}>
    <template data-header>
        {{ $header ?? $name ?? __('Tab name') }}
    </template>

    {{ $slot }}
</div>
