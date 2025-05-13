<div {{ $attrs() }}>
    <x-tallkit-icon
        :name="$icon"
        :attributes="$attrs('icon')"
        :props="$props('icon')"
        :theme="$theme"
    />

    @if ($slot->isNotEmpty() || $text)
        <span {{ $attrs('text') }}>
            {!! $slot->isEmpty() ? __($text) : $slot !!}
        </span>
    @endif
</div>
