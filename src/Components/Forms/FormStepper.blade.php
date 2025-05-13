<x-tallkit-form :attributes="$attr()">
    @if ($title)
        <header {{ $attr('header') }}>
            {!! __($title) !!}
        </header>
    @endif

    <x-tallkit-form-steps :attributes="$attr('steps')">
        <x-slot name="content">
            <x-tallkit-card :attributes="$attr($mode.'-card')">
                @isset ($header)
                    <x-slot name="header">
                        {{ $header }}
                    </x-slot>
                @endisset

                {{ $slot }}

                <x-slot name="footer">
                    @isset ($actions)
                        {{ $actions }}
                    @else
                        <div {{ $attr('actions') }}>
                            @if ($prev)
                                <x-tallkit-button :attributes="$attr('prev')" />
                            @endif

                            @if ($next)
                                <x-tallkit-submit :attributes="$attrs('next')" />
                            @endif
                        </div>

                        @if ($loading && $isWired())
                            <x-tallkit-loading :attributes="$attr('loading')" />
                        @endif
                    @endisset
                </x-slot>
            </x-tallkit-card>
        </x-slot>
    </x-tallkit-form-steps>
</x-tallkit-form>
