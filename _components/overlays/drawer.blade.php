<x-tallkit-toggleable
    :name="$name"
    :show="$show"
    :overlay="$overlay"
    :closeable="$closeable"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    <div {{ $attrs('drawer') }}>
        {{ $slot }}
    </div>
</x-tallkit-toggleable>
