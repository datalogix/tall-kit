@if ($errors->{$bag}->any())
    @if ($type !== 'none')
        <x-message
            {{ $attributes->mergeThemeProvider($themeProvider, 'message') }}
            :type="$type"
            :mode="$mode"
            :rounded="$rounded"
            :shadow="$shadow"
            :icon="$icon"
            :icon-svg="$iconSvg"
            :icon-name="$iconName"
            :timeout="$timeout"
            :dismissible="$dismissible"
            :dismissible-icon="$dismissibleIcon"
            :dismissible-icon-svg="$dismissibleIconSvg"
            :dismissible-icon-name="$dismissibleIconName"
            :dismissible-text="$dismissibleText"
            :title="$title"
            :message="$message"
            :on="$on"
            :theme="$theme"
        >
            <ul {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'ul') }}>
                @foreach ($errors->{$bag}->all() as $error)
                    <li {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'li') }}>{{ $error }}</li>
                @endforeach
            </ul>
        </x-message>
    @else
        <div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
            @if ($title)
                <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'title') }}>
                    {!! __($title) !!}
                </div>
            @endif

            <ul {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'ul') }}>
                @foreach ($errors->{$bag}->all() as $error)
                    <li {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'li') }}>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
