<ul {{ $attrs() }}>
    {{ $prepend ?? '' }}

    @forelse ($items as $item)
        <li {{ $attrs('li') }}>
            <x-dynamic-component
                :component="target_get($item, 'component', 'tallkit-button')"
                :attributes="$attrs('item')"
                :props="$item"
                :theme="$theme"
            />
        </li>
    @empty
        {{ $slot }}
    @endforelse

    {{ $append ?? '' }}
</ul>
