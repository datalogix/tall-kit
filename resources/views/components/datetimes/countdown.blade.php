<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup(\''.$expires->timestamp.'\')'])
}}>
    @if ($slot->isEmpty())
        <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'days') }}>{{ $days() }}</span> :
        <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'hours') }}>{{ $hours() }}</span> :
        <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'minutes') }}>{{ $minutes() }}</span> :
        <span {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'seconds') }}>{{ $seconds() }}</span>
    @else
        {{ $slot }}
    @endif
</div>
