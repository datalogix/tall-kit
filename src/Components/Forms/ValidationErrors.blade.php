@if ($errors->{$bag}->any())
    @if ($type !== 'none')
        <x-tallkit-message :attributes="$attr('message')">
            <ul {{ $attr('ul') }}>
                @foreach ($errors->{$bag}->all() as $error)
                    <li {{ $attr('li') }}>{{ $error }}</li>
                @endforeach
            </ul>
        </x-tallkit-message>
    @else
        <div {{ $attr() }}>
            @if ($title)
                <div {{ $attr('title') }}>
                    {!! __($title) !!}
                </div>
            @endif

            <ul {{ $attr('ul') }}>
                @foreach ($errors->{$bag}->all() as $error)
                    <li {{ $attr('li') }}>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
