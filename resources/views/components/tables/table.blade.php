<div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
    <table {{ $attributes->mergeThemeProvider($themeProvider, 'table') }}>
        @if($cols->isNotEmpty() || ($head ?? false))
            <thead {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'thead') }}>
                <x-row {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tr') }}>
                    @forelse($cols as $key => $col)
                        <x-heading
                            :sortable="$col['sortable'] ?? false"
                            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'th') }}
                        >
                            {{ $col['name'] ?? $col }}
                        </x-heading>
                    @empty
                        {{ $head }}
                    @endforelse
                </x-row>
            </thead>
        @endif

        <tbody {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tbody') }}>
            @forelse($rows as $row)
                <x-row {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tr') }}>
                    @foreach($cols as $key => $col)
                        <x-cell {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'td') }}>
                            {{ ${$key} ?? data_get($row, $key) }}
                        </x-cell>
                    @endforeach
                </x-row>
            @empty
                @if($slot->isNotEmpty())
                    {{ $slot }}
                @elseif($body ?? false)
                    {{ $body }}
                @elseif($empty ?? false)
                    {{ $empty }}
                @elseif($emptyText)
                    <x-row {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tr') }}>
                        <x-cell
                            colspan="{{ count($cols) }}"
                            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'td') }}
                        >
                            <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'emptyText') }}>
                                {{ __($emptyText) }}
                            </span>
                        </x-cell>
                    </x-row>
                @endif
            @endforelse
        </tbody>

        @if($footer->isNotEmpty() || ($foot ?? false))
            <tfoot {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tfoot') }}>
                @forelse($footer as $row)
                    <x-row {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tr') }}>
                        @foreach($cols as $key => $col)
                            <x-cell {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'td') }}>
                                {{ ${$key} ?? data_get($row, $key) }}
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
