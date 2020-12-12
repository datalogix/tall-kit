@if($errors->{$bag}->any())
    @if($type !== 'none')
        <x-alert :type="$type" :title="$title ?? __('Whoops! Something went wrong.')" :class="$themeProvider->alert">
            <ul {{ $themeProvider->ul }}>
                @foreach($errors->{$bag}->all() as $error)
                    <li {{ $themeProvider->li }}>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @else
        <div {{ $attributes->merge(toArray($themeProvider->container)) }}>
            <div {{ $themeProvider->title }}>
                {{ $title ?? __('Whoops! Something went wrong.') }}
            </div>

            <ul {{ $themeProvider->ul }}>
                @foreach($errors->{$bag}->all() as $error)
                    <li {{ $themeProvider->li }}>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
