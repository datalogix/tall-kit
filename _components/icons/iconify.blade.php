<iconify-icon
    {{ $attrs() }}
    icon="{{ $slot->isEmpty() ? $name : $slot }}"
></iconify-icon>
