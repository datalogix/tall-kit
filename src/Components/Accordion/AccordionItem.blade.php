<li {{ $attr() }}>
    <div {{ $attr('trigger') }}>
        {{ $trigger ?? __($name ?? 'Clique to open (Provide your trigger)') }}
    </div>

    <div {{ $attr('item') }}>
        <div {{ $attr('content') }}>
            {{ $slot }}
        </div>
    </div>
</li>
