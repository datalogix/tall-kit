<div {{ $attrs() }}>
    <table {{ $attrs('table') }}>
        @if ($cols->isNotEmpty() || ($head ?? null))
            <thead {{ $attrs('thead') }}>
                <x-tallkit-row
                    :attributes="$attrs('tr')"
                    :props="$props('tr')"
                    :theme="$theme"
                >
                    @forelse ($cols as $key => $col)
                        <x-tallkit-heading
                            :attributes="
                                $attrs('th')
                                    ->merge(['class' => target_get($col, 'class')])
                                    ->merge(['style' => target_get($col, 'style')])
                                    ->merge(target_get($col, ['attrs', 'attributes'], []))
                            "
                            :name="target_get($col, 'name', is_int($key) ? $col : $key)"
                            :align="target_get($col, 'align')"
                            :sortable="target_get($col, 'sortable')"
                            :props="$props('th')"
                            :theme="$theme"
                        >
                            {!! __(target_get($col, 'title')) !!}
                        </x-tallkit-heading>
                    @empty
                        {{ $head }}
                    @endforelse
                </x-tallkit-row>
            </thead>
        @endif

        <tbody {{ $attrs('tbody') }}>
            @forelse ($rows as $row)
                <x-tallkit-row
                    :attributes="
                        $attrs('tr')
                            ->merge(['class' => target_get($row, 'class')])
                            ->merge(['style' => target_get($row, 'style')])
                            ->merge(target_get($row, ['attrs', 'attributes'], []))
                    "
                    :props="$props('tr')"
                    :theme="$theme"
                >
                    @foreach ($cols as $key => $col)
                        <x-tallkit-cell
                            :attributes="
                                $attrs('td')
                                    ->merge(['class' => target_get($col, 'class', $loop->last ? 'w-40' : null)])
                                    ->merge(['style' => target_get($col, 'style')])
                                    ->merge(target_get($col, ['attrs', 'attributes'], []))
                            "
                            :align="target_get($col, 'align')"
                            :props="$props('td')"
                            :theme="$theme"
                        >
                            @isset(${'col_'.target_get($col, 'name', is_int($key) ? $col : $key)})
                                {{ ${'col_'.target_get($col, 'name', is_int($key) ? $col : $key)}($row, $key, $col) }}
                            @else
                                <x-tallkit-display
                                    :attributes="$attrs('display')"
                                    :value="target_get($col, 'value')"
                                    :bind="target_get($col, 'bind', $row)"
                                    :name="target_get($col, 'name', is_int($key) ? $col : $key)"
                                    :default="target_get($col, 'default')"
                                    :props="$props('display')"
                                    :theme="$theme"
                                />
                            @endisset
                        </x-tallkit-cell>
                    @endforeach
                </x-tallkit-row>
            @empty
                @if ($slot->isNotEmpty())
                    {{ $slot }}
                @elseif ($body ?? null)
                    {{ $body }}
                @elseif ($empty ?? null)
                    {{ $empty }}
                @else
                    <x-tallkit-row
                        :attributes="$attrs('tr')"
                        :props="$props('tr')"
                        :theme="$theme"
                    >
                        <x-tallkit-cell
                            :attributes="$attrs('td')->merge(['colspan' => count($cols)])"
                            :props="$props('td')"
                            :theme="$theme"
                        >
                            <span {{ $attrs('empty-text') }}>
                                {!! __($emptyText ?? 'No records') !!}
                            </span>
                        </x-tallkit-cell>
                    </x-tallkit-row>
                @endif
            @endforelse
        </tbody>

        @if ($footer->isNotEmpty() || ($foot ?? null))
            <tfoot {{ $attrs('tfoot') }}>
                @forelse ($footer as $row)
                    <x-tallkit-row
                        :attributes="$attrs('tr')"
                        :props="$props('tr')"
                        :theme="$theme"
                    >
                        @foreach ($cols as $key => $col)
                            <x-tallkit-cell
                                :attributes="
                                    $attrs('td')
                                        ->merge(['class' => target_get($col, 'class')])
                                        ->merge(['style' => target_get($col, 'style')])
                                        ->merge(target_get($col, ['attrs', 'attributes'], []))
                                "
                                :align="target_get($col, 'align')"
                                :props="$props('td')"
                                :theme="$theme"
                            >
                                @isset(${'col_'.target_get($col, 'name', is_int($key) ? $col : $key).'_footer'})
                                    {{ ${'col_'.target_get($col, 'name', is_int($key) ? $col : $key).'_footer'}($row, $key, $col) }}
                                @else
                                    <x-tallkit-display
                                        :attributes="$attrs('display')"
                                        :value="target_get($col, 'value')"
                                        :bind="target_get($col, 'bind', $row)"
                                        :name="target_get($col, 'name', is_int($key) ? $col : $key)"
                                        :default="target_get($col, 'default')"
                                        :props="$props('display')"
                                        :theme="$theme"
                                    />
                                @endisset
                            </x-tallkit-cell>
                        @endforeach
                    </x-tallkit-row>
                @empty
                    {{ $foot }}
                @endforelse
            </tfoot>
        @endif
    </table>
</div>
