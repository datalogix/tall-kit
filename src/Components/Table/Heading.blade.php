<th {{ $attr() }}>
    <{{ $sortable ? 'a' : 'div'}} {{ $attr('content') }}>
        {!! $slot->isEmpty() ? __($name) : $slot !!}

        @if ($sortable === 'asc' || $sortable === 'desc')
            <x-tallkit-icon :attributes="$attr('sortable')" />
        @endif
    </{{ $sortable ? 'a' : 'div'}}>
</th>
