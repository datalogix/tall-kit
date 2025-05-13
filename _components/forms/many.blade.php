<x-tallkit-group
    :name="$name"
    :label="$label"
    :fieldset="$fieldset"
    :show-errors="$showErrors"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    {{ $header ?? '' }}

    @if ($showHeaderCreate)
        <x-tallkit-button
            preset="create"
            :attributes="$attrs('header-create')"
            :props="$props('header-create')"
            :theme="$theme"
        />
    @endif

    @if ($allowEmpty)
        <template x-if="items.length">
    @endif

    <x-tallkit-table
        :cols="$heading ? $cols->push('') : []"
        :footer="$footer"
        :attributes="$attrs('table')"
        :props="$props('table')"
        :theme="$theme"
    >
        <template x-for="(item, index) in items">
            <x-tallkit-row
                :attributes="$attrs('row')"
                :props="$props('row')"
                :theme="$theme"
            >
                @forelse($fields as $field)
                    <x-tallkit-cell
                        :align="target_get($field, 'td.align')"
                        :attributes="$attrs('td')->merge(target_get($field, 'td', []))"
                        :props="$props('td')"
                        :theme="$theme"
                    >
                        @isset(${'col_'.target_get($field, 'name')})
                            {{ ${'col_'.target_get($field, 'name')}($field) }}
                        @else
                            <x-tallkit-fields-generator
                                x-model="item.{{ target_get($field, 'name') }}"
                                id="false"
                                :name="$name ? $name.'[]['.target_get($field, 'name').']' : target_get($field, 'name').'[]'"
                                :fields="[$field]"
                                :label="$labels ? target_get(is_iterable($labels) ? $labels : $field, 'label') : false"
                                :attributes="$attrs('field')"
                                :props="$attrs('props')"
                                :theme="$theme"
                            />
                        @endisset
                    </x-tallkit-cell>
                @empty
                    {{ $slot }}
                @endforelse

                @isset ($actions)
                    {{ $actions }}
                @else
                    <x-tallkit-cell
                        :attributes="$attrs('td')->merge($attrs('actions')->merge()->getAttributes())"
                        :props="$props('td')"
                        :theme="$theme"
                    >
                        @isset ($buttonCreate)
                            {{ $buttonCreate }}
                        @else
                            <x-tallkit-button
                                preset="create"
                                :text="$tooltip ? '' : null"
                                :tooltip="$tooltip"
                                :attributes="$attrs('create')"
                                :props="$props('create')"
                                :theme="$theme"
                            />
                        @endisset

                        @isset ($buttonDelete)
                            {{ $buttonDelete }}
                        @else
                            <x-tallkit-button
                                preset="delete"
                                :text="$tooltip ? '' : null"
                                :tooltip="$tooltip"
                                :attributes="$attrs('delete')"
                                :props="$props('delete')"
                                :theme="$theme"
                            />
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
