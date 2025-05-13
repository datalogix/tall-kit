@if ($errors->{$bag}->any())
    @if ($type !== 'none')
        <x-tallkit-message
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
            :attributes="$attrs('message')"
            :props="$props('message')"
            :theme="$theme"
        >
            <ul {{ $attrs('ul') }}>
                @foreach ($errors->{$bag}->all() as $error)
                    <li {{ $attrs('li') }}>{{ $error }}</li>
                @endforeach
            </ul>
        </x-tallkit-message>
    @else
        <div {{ $attrs() }}>
            @if ($title)
                <div {{ $attrs('title') }}>
                    {!! __($title) !!}
                </div>
            @endif

            <ul {{ $attrs('ul') }}>
                @foreach ($errors->{$bag}->all() as $error)
                    <li {{ $attrs('li') }}>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
