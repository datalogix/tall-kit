<div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
    <table {{ $attributes->mergeThemeProvider($themeProvider, 'table') }}>
        @if ($cols->isNotEmpty() || ($head ?? null))
            <thead {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'thead') }}>
                <x-row
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tr') }}
                    :theme="$theme"
                >
                    @forelse ($cols as $key => $col)
                        <x-heading {{
                                $attributes
                                    ->mergeOnlyThemeProvider($themeProvider, 'th')
                                    ->merge(['class' => data_get($col, 'class')])
                                    ->merge(['style' => data_get($col, 'style')])
                                    ->merge(data_get($col, 'attrs', []))
                                    ->merge(data_get($col, 'attributes', []))
                            }}
                            :name="data_get($col, 'name', is_int($key) ? $col : $key)"
                            :align="data_get($col, 'align')"
                            :sortable="data_get($col, 'sortable')"
                            :theme="$theme"
                        >
                            {!! __(data_get($col, 'title')) !!}
                        </x-heading>
                    @empty
                        {{ $head }}
                    @endforelse
                </x-row>
            </thead>
        @endif

        <tbody {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tbody') }}>
            @forelse ($rows as $row)
                <x-row {{
                    $attributes->mergeOnlyThemeProvider($themeProvider, 'tr')
                        ->merge(['class' => data_get($row, 'class')])
                        ->merge(['style' => data_get($row, 'style')])
                        ->merge(data_get($row, 'attrs', []))
                        ->merge(data_get($row, 'attributes', []))
                    }}
                    :theme="$theme"
                >
                    @foreach ($cols as $key => $col)
                        <x-cell {{
                                $attributes
                                    ->mergeOnlyThemeProvider($themeProvider, 'td')
                                    ->merge(['class' => data_get($col, 'class', $loop->last ? 'w-40' : null)])
                                    ->merge(['style' => data_get($col, 'style')])
                                    ->merge(data_get($col, 'attrs', []))
                                    ->merge(data_get($col, 'attributes', []))
                            }}
                            :align="data_get($col, 'align')"
                            :theme="$theme"
                        >
                            @isset(${'col_'.data_get($col, 'name', is_int($key) ? $col : $key)})
                                {{ ${'col_'.data_get($col, 'name', is_int($key) ? $col : $key)}($row, $key, $col) }}
                            @else
                                <x-display
                                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'display') }}
                                    :value="data_get($col, 'value')"
                                    :bind="data_get($col, 'bind', $row)"
                                    :name="data_get($col, 'name', is_int($key) ? $col : $key)"
                                    :default="data_get($col, 'default')"
                                    :theme="$theme"
                                />
                            @endisset
                        </x-cell>
                    @endforeach
                </x-row>
            @empty
                @if ($slot->isNotEmpty())
                    {{ $slot }}
                @elseif ($body ?? null)
                    {{ $body }}
                @elseif ($empty ?? null)
                    {{ $empty }}
                @else
                    <x-row
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tr') }}
                        :theme="$theme"
                    >
                        <x-cell
                            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'td') }}
                            colspan="{{ count($cols) }}"
                            :theme="$theme"
                        >
                            <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'empty-text') }}>
                                {!! __($emptyText ?? 'No records') !!}
                            </span>
                        </x-cell>
                    </x-row>
                @endif
            @endforelse
        </tbody>

        @if ($footer->isNotEmpty() || ($foot ?? null))
            <tfoot {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tfoot') }}>
                @forelse ($footer as $row)
                    <x-row
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tr') }}
                        :theme="$theme"
                    >
                        @foreach ($cols as $key => $col)
                            <x-cell {{
                                    $attributes
                                        ->mergeOnlyThemeProvider($themeProvider, 'td')
                                        ->merge(['class' => data_get($col, 'class')])
                                        ->merge(['style' => data_get($col, 'style')])
                                        ->merge(data_get($col, 'attrs', []))
                                        ->merge(data_get($col, 'attributes', []))
                                }}
                                :align="data_get($col, 'align')"
                                :theme="$theme"
                            >
                                @isset(${'col_'.data_get($col, 'name', is_int($key) ? $col : $key).'_footer'})
                                    {{ ${'col_'.data_get($col, 'name', is_int($key) ? $col : $key).'_footer'}($row, $key, $col) }}
                                @else
                                    <x-display
                                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'display') }}
                                        :value="data_get($col, 'value')"
                                        :bind="data_get($col, 'bind', $row)"
                                        :name="data_get($col, 'name', is_int($key) ? $col : $key)"
                                        :default="data_get($col, 'default')"
                                        :theme="$theme"
                                    />
                                @endisset
                            </x-cell>
                        @endforeach
                    </x-row>
                @empty
                    {{ $foot }}
                @endforelse
            </tfoot>
        @endif
    </table>
</div>
