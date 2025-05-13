@empty ($_COOKIE[$name])
    <div {{ $attr() }}>
        <x-tallkit-modal :attributes="$attr('modal')">
            @if ($slot->isEmpty())
                <x-tallkit-section :attributes="$attr('section')">
                    <div {{ $attr('content') }}>
                        @isset ($content)
                            {{ $content }}
                        @else
                            {!! __($description) !!}

                            <a {{ $attr('link') }}>
                                {!! __($more) !!}
                            </a>
                        @endisset
                    </div>

                    @isset ($button)
                        {{ $button }}
                    @else
                        <x-tallkit-button :attributes="$attr('button')" />
                    @endisset

                    <x-slot name="actions">
                        {{ $actions ?? '' }}
                    </x-slot>
                </x-tallkit-section>
            @else
                {{ $slot }}
            @endif
        </x-tallkit-modal>
    </div>
@endempty
