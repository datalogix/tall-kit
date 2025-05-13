<div {{ $attr() }}>
    @if (is_array($value) && $component = target_get($value, 'component'))
        <x-dynamic-component
            :component="$component"
            :attributes="$attr('component')"
        >
            {!! target_get($value, 'slot', $slot) !!}
        </x-dynamic-component>
    @elseif (Str::endsWith($value, ['.jpg', '.jpeg', '.gif', '.png']))
        <img {{ $attr('img') }} />
    @elseif (Str::endsWith($value, '.mp3'))
        <audio {{ $attr('audio') }}>
            <source {{ $attr('audio-source') }}>
        </audio>
    @elseif (Str::endsWith($value, '.mp4'))
        <video {{ $attr('video') }}>
            <source {{ $attr('video-source') }}>
        </video>
    @elseif (filter_var($value, FILTER_VALIDATE_URL))
        <x-tallkit-button :attributes="$attr('download')" />
    @elseif ($value === true)
        <x-tallkit-icon :attributes="$attr('check')" />
    @elseif ($value === false)
        <x-tallkit-icon :attributes="$attr('uncheck')" />
    @else
        {!! $slot->isEmpty() ? $value : $slot !!}
    @endif
</div>
