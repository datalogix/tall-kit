<li {{ $attrs() }}>
    <div {{ $attrs('trigger') }}>
        {{ $trigger ?? $name ?? __('Clique to open (Provide your trigger)') }}
    </div>

    <div {{ $attrs('item') }}>
        <div {{ $attrs('content') }}>
            {{ $slot }}
        </div>
    </div>
</li>
