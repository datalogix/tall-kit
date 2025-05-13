<div {{ $attr() }}>
    <table {{ $attr('table') }}>
        @if ($cols->isNotEmpty() || ($head ?? null))
            <thead {{ $attr('thead') }}>
                <x-tallkit-row :attributes="$attr('tr')">
                    @forelse ($cols as $key => $col)
                        <x-tallkit-heading :attributes="$attr('th')->merge(is_array($col) ? $col : [])->attr('name', is_int($key) ? $col : $key)">
                            {!! __(target_get($col, 'title')) !!}
                        </x-tallkit-heading>
                    @empty
                        {{ $head }}
                    @endforelse
                </x-tallkit-row>
            </thead>
        @endif

        <tbody {{ $attr('tbody') }}>
            @forelse ($rows as $row)
                <x-tallkit-row :attributes="$attr('tr')->merge(is_array($row) ? $row : [])">
                    @foreach ($cols as $key => $col)
                        <x-tallkit-cell :attributes="$attr('td')->merge(is_array($col) ? $col : [])->class($loop->last ? 'w-40' : null)">
                            @isset(${'col_'.target_get($col, 'name', is_int($key) ? $col : $key)})
                                {{ ${'col_'.target_get($col, 'name', is_int($key) ? $col : $key)}($row, $key, $col) }}
                            @else
                                <x-tallkit-display
                                    :attributes="$attr('display')"
                                    :bind="target_get($col, 'bind', $row)"
                                    :name="target_get($col, 'name', is_int($key) ? $col : $key)"
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
                    <x-tallkit-row :attributes="$attr('tr')">
                        <x-tallkit-cell :attributes="$attr('td')->merge(['colspan' => count($cols)])">
                            <span {{ $attr('empty-text') }}>
                                {!! __($emptyText ?? 'No records') !!}
                            </span>
                        </x-tallkit-cell>
                    </x-tallkit-row>
                @endif
            @endforelse
        </tbody>

        @if ($footer->isNotEmpty() || ($foot ?? null))
            <tfoot {{ $attr('tfoot') }}>
                @forelse ($footer as $row)
                    <x-tallkit-row :attributes="$attr('tr')">
                        @foreach ($cols as $key => $col)
                            <x-tallkit-cell :attributes="$attr('td')->merge(is_array($col) ? $col : [])">
                                @isset(${'col_'.target_get($col, 'name', is_int($key) ? $col : $key).'_footer'})
                                    {{ ${'col_'.target_get($col, 'name', is_int($key) ? $col : $key).'_footer'}($row, $key, $col) }}
                                @else
                                    <x-tallkit-display
                                        :attributes="$attr('display')"
                                        :bind="target_get($col, 'bind', $row)"
                                        :name="target_get($col, 'name', is_int($key) ? $col : $key)"
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
