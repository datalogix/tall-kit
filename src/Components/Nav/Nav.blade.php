<ul {{ $attr() }}>
    {{ $prepend ?? '' }}

    @forelse (collect_value($items) as $item)
        <li {{ $attr('li') }}>
            <x-dynamic-component
                :component="target_get($item, 'component', 'tallkit-button')"
                :attributes="$attr('item')"
            />
        </li>
    @empty
        {{ $slot }}
    @endforelse

    {{ $append ?? '' }}
</ul>
