<x-tallkit-group :attributes="$attr()">
    {{ $header ?? '' }}

    @if ($showHeaderCreate)
        <x-tallkit-button :attributes="$attr('header-create')" />
    @endif

    @if ($allowEmpty)
        <template x-if="items.length">
    @endif

    <x-tallkit-table :attributes="$attr('table')">
        <template x-for="(item, index) in items">
            <x-tallkit-row :attributes="$attr('row')">
                @forelse($fields as $field)
                    <x-tallkit-cell :attributes="$attr('td')->merge(target_get($field, 'td', []))">
                        @isset(${'col_'.target_get($field, 'name')})
                            {{ ${'col_'.target_get($field, 'name')}($field) }}
                        @else
                            <x-tallkit-fields-generator :attributes="$attr('field')->attr('name', $name ? $name.'[]['.target_get($field, 'name').']' : target_get($field, 'name').'[]')" />
                        @endisset
                    </x-tallkit-cell>
                @empty
                    {{ $slot }}
                @endforelse

                @isset ($actions)
                    {{ $actions }}
                @else
                    <x-tallkit-cell :attributes="$attr('td')->merge($attr('actions'))">
                        @isset ($buttonCreate)
                            {{ $buttonCreate }}
                        @else
                            <x-tallkit-button :attributes="$attr('create')" />
                        @endisset

                        @isset ($buttonDelete)
                            {{ $buttonDelete }}
                        @else
                            <x-tallkit-button :attributes="$attr('delete')" />
                        @endisset
                    </x-tallkit-cell>
                @endisset
            </x-tallkit-row>
        </template>

        @isset ($head)
            <x-slot name="head">
                {{ $head }}
            </x-slot>
        @endisset

        @isset ($foot)
            <x-slot name="foot">
                {{ $foot }}
            </x-slot>
        @endisset
    </x-tallkit-table>

    @if ($allowEmpty)
        </template>
    @endif
</x-tallkit-group>
