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
                                    ->merge(['class' => target_get($col, 'class')])
                                    ->merge(['style' => target_get($col, 'style')])
                                    ->merge(target_get($col, ['attrs', 'attributes'], []))
                            }}
                            :name="target_get($col, 'name', is_int($key) ? $col : $key)"
                            :align="target_get($col, 'align')"
                            :sortable="target_get($col, 'sortable')"
                            :theme="$theme"
                        >
                            {!! __(target_get($col, 'title')) !!}
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
                        ->merge(['class' => target_get($row, 'class')])
                        ->merge(['style' => target_get($row, 'style')])
                        ->merge(target_get($row, ['attrs', 'attributes'], []))
                    }}
                    :theme="$theme"
                >
                    @foreach ($cols as $key => $col)
                        <x-cell {{
                                $attributes
                                    ->mergeOnlyThemeProvider($themeProvider, 'td')
                                    ->merge(['class' => target_get($col, 'class', $loop->last ? 'w-40' : null)])
                                    ->merge(['style' => target_get($col, 'style')])
                                    ->merge(target_get($col, ['attrs', 'attributes'], []))
                            }}
                            :align="target_get($col, 'align')"
                            :theme="$theme"
                        >
                            @isset(${'col_'.target_get($col, 'name', is_int($key) ? $col : $key)})
                                {{ ${'col_'.target_get($col, 'name', is_int($key) ? $col : $key)}($row, $key, $col) }}
                            @else
                                <x-display
                                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'display') }}
                                    :value="target_get($col, 'value')"
                                    :bind="target_get($col, 'bind', $row)"
                                    :name="target_get($col, 'name', is_int($key) ? $col : $key)"
                                    :default="target_get($col, 'default')"
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
                                        ->merge(['class' => target_get($col, 'class')])
                                        ->merge(['style' => target_get($col, 'style')])
                                        ->merge(target_get($col, ['attrs', 'attributes'], []))
                                }}
                                :align="target_get($col, 'align')"
                                :theme="$theme"
                            >
                                @isset(${'col_'.target_get($col, 'name', is_int($key) ? $col : $key).'_footer'})
                                    {{ ${'col_'.target_get($col, 'name', is_int($key) ? $col : $key).'_footer'}($row, $key, $col) }}
                                @else
                                    <x-display
                                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'display') }}
                                        :value="target_get($col, 'value')"
                                        :bind="target_get($col, 'bind', $row)"
                                        :name="target_get($col, 'name', is_int($key) ? $col : $key)"
                                        :default="target_get($col, 'default')"
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
