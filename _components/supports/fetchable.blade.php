<div {{ $attrs() }}>
    {{ $header ?? '' }}

    <div {{ $attrs('content') }}>
        @isset ($empty)
            <div {{ $attrs('empty') }}>
                {{ $empty }}
            </div>
        @endisset

        <template x-if="isCompleted()">
            @isset ($completed)
                {{ $completed }}
            @else
                <div {{ $attrs('completed') }}>
                    @if ($slot->isEmpty())
                        <x-tallkit-json
                            :attributes="$attrs('json')"
                            :props="$props('json')"
                            :theme="$theme"
                        />
                    @else
                        {{ $slot }}
                    @endif
                </div>
            @endisset
        </template>

        @isset ($loading)
            <div {{ $attrs('loading') }}>
                {{ $loading }}
            </div>
        @else
            <x-tallkit-loading
                :attributes="$attrs('loading')"
                :props="$props('loading')"
                :theme="$theme"
            />
        @endisset

        @isset ($error)
            <div {{ $attrs('error') }}>
                {{ $error }}
            </div>
        @else
            <x-tallkit-error
                :attributes="$attrs('error')"
                :props="$props('error')"
                :theme="$theme"
            />
        @endisset
    </div>

    {{ $footer ?? '' }}
</div>
