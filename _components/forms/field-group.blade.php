<div {{ $attrs() }}>
    @if (isset($prepend) || $prependText || $prependIcon)
        <span {{ $attrs('prepend') }}>
            {{ $prepend ?? '' }}
            {{ $prependText ?? '' }}
            <x-tallkit-icon
                :name="$prependIcon"
                :attributes="$attrs('prepend-icon')"
                :props="$props('prepend-icon')"
                :theme="$theme"
            />
        </span>
    @endif

    <span {{ $attrs('field') }}>
        {{ $slot }}
    </span>

    @if (isset($append) || $appendText || $appendIcon)
        <span {{ $attrs('append') }}>
            {{ $append ?? '' }}
            {{ $appendText ?? '' }}
            <x-tallkit-icon
                :name="$appendIcon"
                :attributes="$attrs('append-icon')"
                :props="$props('append-icon')"
                :theme="$theme"
            />
        </span>
    @endif
</div>
