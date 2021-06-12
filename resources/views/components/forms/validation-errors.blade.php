@if($errors->{$bag}->any())
    @if($type !== 'none')
        <x-alert
            :type="$type"
            :title="$title ?? __('Whoops! Something went wrong.')"
            {{ $attributes->mergeThemeProvider($themeProvider, 'alert') }}
        >
            <ul {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'ul') }}>
                @foreach($errors->{$bag}->all() as $error)
                    <li {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'li') }}>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @else
        <div {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}>
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'title') }}>
                {{ $title ?? __('Whoops! Something went wrong.') }}
            </div>

            <ul {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'ul') }}>
                @foreach($errors->{$bag}->all() as $error)
                    <li {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'li') }}>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
