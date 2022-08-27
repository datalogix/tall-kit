<x-group {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$items().', '.$allowEmpty.')'])
    }}
    :name="$name"
    :label="$label"
    :fieldset="$fieldset"
    :show-errors="$showErrors"
    :theme="$theme"
>
    {{ $header ?? '' }}

    @if ($showHeaderCreate)
        <x-button
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'header-create') }}
            preset="create"
            :theme="$theme"
        />
    @endif

    @if ($allowEmpty)
        <template x-if="items.length">
    @endif

    <x-table
        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'table') }}
        :cols="$heading ? $cols->push('') : []"
        :footer="$footer"
        :theme="$theme"
    >
        <template x-for="(item, index) in items">
            <x-row
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'row') }}
                :theme="$theme"
            >
                @forelse($fields as $field)
                    <x-cell {{
                        $attributes
                            ->mergeOnlyThemeProvider($themeProvider, 'td')
                            ->merge(target_get($field, 'td', []))
                        }}
                        :align="target_get($field, 'td.align')"
                        :theme="$theme"
                    >
                        @isset(${'col_'.target_get($field, 'name')})
                            {{ ${'col_'.target_get($field, 'name')}($field) }}
                        @else
                            <x-fields-generator
                                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'field') }}
                                x-model="item.{{ target_get($field, 'name') }}"
                                id="false"
                                :name="$name ? $name.'[]['.target_get($field, 'name').']' : target_get($field, 'name').'[]'"
                                :fields="[$field]"
                                :label="$labels ? target_get(is_iterable($labels) ? $labels : $field, 'label') : false"
                                :theme="$theme"
                            />
                        @endisset
                    </x-cell>
                @empty
                    {{ $slot }}
                @endforelse

                @isset ($actions)
                    {{ $actions }}
                @else
                    <x-cell {{
                        $attributes
                            ->mergeOnlyThemeProvider($themeProvider, 'td')
                            ->mergeOnlyThemeProvider($themeProvider, 'actions')
                        }}
                        :theme="$theme"
                    >
                        @isset ($buttonCreate)
                            {{ $buttonCreate }}
                        @else
                            <x-button
                                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'create') }}
                                preset="create"
                                :text="$tooltip ? '' : null"
                                :tooltip="$tooltip"
                                :theme="$theme"
                            />
                        @endisset

                        @isset ($buttonDelete)
                            {{ $buttonDelete }}
                        @else
                            <x-button
                                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'delete') }}
                                preset="delete"
                                :text="$tooltip ? '' : null"
                                :tooltip="$tooltip"
                                :theme="$theme"
                            />
                        @endisset
                    </x-cell>
                @endisset
            </x-row>
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
    </x-table>

    @if ($allowEmpty)
        </template>
    @endif
</x-group>
