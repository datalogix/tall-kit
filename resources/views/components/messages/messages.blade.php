@foreach($messages as $message)
    <x-message
        {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
        :options="$message"
        :theme="$theme"
    />
@endforeach
