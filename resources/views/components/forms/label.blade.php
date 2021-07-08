@if ($label || $slot->isNotEmpty())
    <span {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
        {!! $slot->isEmpty() ? __($label) : $slot !!}
    </span>
@endif
