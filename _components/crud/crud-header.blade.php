<div {{ $attrs() }}>
    <h2 {{ $attrs('title') }}>
        {!! __($title) !!}
    </h2>
    <div {{ $attrs('actions') }}>
        {{ $slot }}
    </div>
</div>
