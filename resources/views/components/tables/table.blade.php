<div {{ $themeProvider->container }}>
    <table {{ $attributes->merge($themeProvider->table->toArray()) }}>
        @if($cols->isNotEmpty() || ($head ?? false))
            <thead {{ $themeProvider->thead }}>
                <tr>
                    @forelse($cols as $key => $col)
                        <x-heading :sortable="$col['sortable'] ?? false">
                            {{ $col['name'] ?? $col }}
                        </x-heading>
                    @empty
                        {{ $head }}
                    @endforelse
                </tr>
            </thead>
        @endif

        <tbody {{ $themeProvider->tbody }}>
            @forelse($rows as $row)
                <x-row>
                    @foreach($cols as $key => $col)
                        <x-cell>
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
                    <x-row>
                        <td {{ $themeProvider->emptyText }} colspan="{{ count($cols) }}">
                            {{ $emptyText }}
                        </td>
                    </x-row>
                @endif
            @endforelse
        </tbody>

        @if($footer->isNotEmpty() || ($foot ?? false))
            <tfoot {{ $themeProvider->tfoot }}>
                @forelse($footer as $row)
                    <x-row>
                        @foreach($cols as $key => $col)
                            <x-cell>
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
