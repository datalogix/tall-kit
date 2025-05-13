<th {{ $attrs() }}>
    <{{ $sortable ? 'a' : 'div'}} {{ $attrs('content') }}>
        {!! $slot->isEmpty() ? __($name) : $slot !!}

        @if ($sortable === 'asc' || $sortable === 'desc')
            <x-tallkit-icon
                :attributes="$attrs('sortable')"
                :props="$props('sortable')"
                :theme="$theme"
            />
        @endif
    </{{ $sortable ? 'a' : 'div'}}>
</th>
