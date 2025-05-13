<x-tallkit-form :attributes="$attr('root', false)">
    <x-tallkit-submit :attributes="$attr('button', true)">
        {{ $slot }}
    </x-tallkit-submit>
</x-tallkit-form>
