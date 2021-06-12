<li {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}>
    <{{ $href ? 'a' : 'button' }}
        @if ($href) :href="$href" @endif
        {{ $attributes->mergeThemeProvider($themeProvider, $href ? 'link' : 'button') }}
    >
        <x-icon
            :name="$iconLeft"
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'iconLeft') }}
        />

        {{ $slot->isEmpty() ? __($text) : $slot }}

        <x-icon
            :name="$iconRight"
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'iconRight') }}
        />
    </{{ $href ? 'a' : 'button' }}>
</li>
