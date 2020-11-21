<div {{ $themeProvider->container }}>
    <table {{ $attributes->merge($themeProvider->table->toArray()) }}>
        @if($cols->isNotEmpty() || isset($head))
            <thead>
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

        <tbody>
            @forelse($rows as $row)
                <x-row>
                    @foreach($cols as $key => $col)
                        <x-cell>
                            {{ ${$key} ?? data_get($row, $key) }}
                        </x-cell>
                    @endforeach
                </x-row>
            @empty
                @if(isset($body))
                    {{ $body }}
                @elseif(isset($empty))
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

        @if($footer->isNotEmpty() || isset($foot))
            <tfoot>
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
