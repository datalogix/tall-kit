<div {{ $attrs() }}>
    @if (is_array($value) && $component = target_get($value, 'component'))
        <x-dynamic-component
            :component="$component"
            :attributes="$attrs('component')"
            :props="$props('component')"
            :theme="$theme"
        >
            {!! target_get($value, 'slot', $slot) !!}
        </x-dynamic-component>
    @elseif (Str::endsWith($value, ['.jpg', '.jpeg', '.gif', '.png']))
        <img {{ $attrs('img') }} />
    @elseif (Str::endsWith($value, '.mp3'))
        <audio {{ $attrs('audio') }}>
            <source {{ $attrs('audio-source') }}>
        </audio>
    @elseif (Str::endsWith($value, '.mp4'))
        <video {{ $attrs('video') }}>
            <source {{ $attrs('video-source') }}>
        </video>
    @elseif (filter_var($value, FILTER_VALIDATE_URL))
        <x-tallkit-button
            :attributes="$attrs('download')"
            :props="$props('download')"
            :theme="$theme"
        />
    @elseif ($value === true)
        <x-tallkit-icon
            :attributes="$attrs('check')"
            :props="$props('check')"
            :theme="$theme"
        />
    @elseif ($value === false)
        <x-tallkit-icon
            :attributes="$attrs('uncheck')"
            :props="$props('uncheck')"
            :theme="$theme"
        />
    @else
        {!! $slot->isEmpty() ? $value : $slot !!}
    @endif
</div>
