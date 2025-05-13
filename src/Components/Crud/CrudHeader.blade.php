<div {{ $atts() }}>
    <h2 {{ $attr('title') }}>
        {!! __($title) !!}
    </h2>
    <div {{ $attr('actions') }}>
        {{ $slot }}
    </div>
</div>
