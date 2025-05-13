<x-tallkit-field :attributes="$attr('root', false)">
    <textarea {{ $attr('textarea', true) }}>@unless($isWired()){{ $value ?? $slot }}@endunless</textarea>

    @isset ($labelContent)
        <x-slot name="labelContent">
            {{ $labelContent }}
        </x-slot>
    @endisset

    @isset ($before)
        <x-slot name="before">
            {{ $before }}
        </x-slot>
    @endisset

    @isset ($after)
        <x-slot name="after">
            {{ $after }}
        </x-slot>
    @endisset

    @isset ($prepend)
        <x-slot name="prepend">
            {{ $prepend }}
        </x-slot>
    @endisset

    @isset ($append)
        <x-slot name="append">
            {{ $append }}
        </x-slot>
    @endisset
</x-tallkit-field>
