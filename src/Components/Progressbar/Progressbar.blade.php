<div {{ $attr('root', false) }}>
    <div {{ $attr('bar') }}>
        <div {{ $attr('progress', true) }}></div>
    </div>

    {{ $slot }}
</div>
