<span {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
    title="{{ $human ? ($slot->isEmpty() ? $schedule : $slot) : $translate($slot->isEmpty() ? $schedule : $slot) }}"
>
    {{ $human ? $translate($slot->isEmpty() ? $schedule : $slot) : ($slot->isEmpty() ? $schedule : $slot) }}
</span>
