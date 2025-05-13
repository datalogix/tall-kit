<span
    {{ $attr() }}
    title="{{ $human ? ($slot->isEmpty() ? $value : $slot) : $translate($slot->isEmpty() ? $value : $slot) }}"
>
    {{ $human ? $translate($slot->isEmpty() ? $value : $slot) : ($slot->isEmpty() ? $value : $slot) }}
</span>
