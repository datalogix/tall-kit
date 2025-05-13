<x-tallkit-field :attributes="$attr()">
    <label {{ $attr('label-container') }}>
        <x-tallkit-label :attributes="$attr('label')">
            {{ $labelContent ?? '' }}
        </x-tallkit-label>

        <div {{ $attr('field') }}>
            <input {{ $attr('input', false) }} />

            @isset ($empty)
                {{ $empty }}
            @else
                <x-tallkit-button :attributes="$attr('empty')">{{ $slot }}</x-tallkit-button>
            @endisset

            <div {{ $attr('loading') }}>
                @isset ($loading)
                    {{ $loading }}
                @else
                    <x-tallkit-icon :attributes="$attr('loading-icon')" />
                @endisset
            </div>

            @isset ($error)
                {{ $error }}
            @else
                <x-tallkit-button :attributes="$attr('error')" />
            @endisset

            <div {{ $attr('complete') }}>
                <img {{ $attr('img') }} />

                <div {{ $attr('actions') }}>
                    @isset ($actions)
                        {{ $actions }}
                    @else
                        @isset ($edit)
                            {{ $edit }}
                        @else
                            <x-tallkit-button :attributes="$attr('edit')" />
                        @endisset

                        @isset ($delete)
                            {{ $delete }}
                        @else
                            <x-tallkit-button :attributes="$attr('delete')" />
                        @endisset
                    @endisset
                </div>
            </div>
        </div>
    </label>
</x-tallkit-field>
