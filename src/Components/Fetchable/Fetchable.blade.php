<div {{ $attr() }}>
    {{ $header ?? '' }}

    <div {{ $attr('content') }}>
        @isset ($empty)
            <div {{ $attr('empty') }}>
                {{ $empty }}
            </div>
        @endisset

        <template x-if="isCompleted()">
            @isset ($completed)
                {{ $completed }}
            @else
                <div {{ $attr('completed') }}>
                    @if ($slot->isEmpty())
                        <x-tallkit-json :attributes="$attr('json')" />
                    @else
                        {{ $slot }}
                    @endif
                </div>
            @endisset
        </template>

        @isset ($loading)
            <div {{ $attr('loading') }}>
                {{ $loading }}
            </div>
        @else
            <x-tallkit-loading :attributes="$attr('loading')" />
        @endisset

        @isset ($error)
            <div {{ $attr('error') }}>
                {{ $error }}
            </div>
        @else
            <x-tallkit-error :attributes="$attr('error')" />
        @endisset
    </div>

    {{ $footer ?? '' }}
</div>
