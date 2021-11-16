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
                                    ->merge(isset($col['class']) ? ['class' => $col['class']] : [])
                                    ->merge(isset($col['style']) ? ['style' => $col['style']] : [])
                                    ->merge(isset($col['attrs']) ? $col['attrs'] : [])
                            }}
                            :align="$col['align'] ?? null"
                            :sortable="$col['sortable'] ?? null"
                            :theme="$theme"
                        >
                            {{ __($col['name'] ?? $col) }}
                        </x-heading>
                    @empty
                        {{ $head }}
                    @endforelse
                </x-row>
            </thead>
        @endif

        <tbody {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tbody') }}>
            @forelse ($rows as $row)
                <x-row
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tr') }}
                    :theme="$theme"
                >
                    @foreach ($cols as $key => $col)
                        <x-cell {{
                                $attributes
                                    ->mergeOnlyThemeProvider($themeProvider, 'td')
                                    ->merge(isset($col['class']) ? ['class' => $col['class']] : ($loop->last ? ['class' => 'w-40'] : []))
                                    ->merge(isset($col['style']) ? ['style' => $col['style']] : [])
                                    ->merge(isset($col['attrs']) ? $col['attrs'] : [])
                            }}
                            :align="$col['align'] ?? null"
                            :theme="$theme"
                        >
                            @isset(${is_int($key) ? $col : $key})
                                {{ ${is_int($key) ? $col : $key}($row, $key, $col) }}
                            @else
                                <x-display
                                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'display') }}
                                    :target="$row"
                                    :key="is_int($key) ? $col : $key"
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
                            <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'emptyText') }}>
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
                                        ->merge(isset($col['class']) ? ['class' => $col['class']] : [])
                                        ->merge(isset($col['style']) ? ['style' => $col['style']] : [])
                                        ->merge(isset($col['attrs']) ? $col['attrs'] : [])
                                }}
                                :align="$col['align']"
                                :theme="$theme"
                            >
                                @isset(${(is_int($key) ? $col : $key).'-footer'})
                                    {{ ${(is_int($key) ? $col : $key).'-footer'}($row, $key, $col) }}
                                @else
                                    <x-display
                                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'display') }}
                                        :target="$row"
                                        :key="is_int($key) ? $col : $key"
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

@if ($paginator)
    {{ $paginator->withQueryString()->links() }}
@endif
