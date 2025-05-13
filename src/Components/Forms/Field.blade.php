<div {{ $attr() }}>
    @if ($groupable === false && $label === false)
        {{ $before ?? '' }}
        {{ $slot }}
        {{ $after ?? '' }}
    @else
        @if ($label !== false)
            <label {{ $attr('label-container') }}>
                <x-tallkit-label :attributes="$attr('label')">
                    {{ $labelContent ?? '' }}
                </x-tallkit-label>
            @if (!$labelWrapper)
                </label>
            @endif
        @endif

        <div {{ $attr('field-group') }}>
            @if (isset($prepend) || $iconLeft || $icon)
                <span {{ $attr('prepend') }}>
                    {{ $prepend ?? '' }}
                    <x-tallkit-icon :attributes="$attr('icon-left')" />
                </span>
            @endif

            <span {{ $attr('field') }}>
                {{ $before ?? '' }}
                {{ $slot }}
                {{ $after ?? '' }}
            </span>

            @if (isset($append) || $iconRight)
                <span {{ $attr('append') }}>
                    {{ $append ?? '' }}
                    <x-tallkit-icon :attributes="$attr('icon-right')" />
                </span>
            @endif
        </div>

        @if ($label !== false && $labelWrapper)
            </label>
        @endif
    @endif

    @if ($hasErrorAndShow())
        <x-tallkit-field-error :attributes="$attr('field-error')" />
    @endif

    @if ($display)
        <x-tallkit-display :attributes="$attr('display')" />
    @endif
</div>
