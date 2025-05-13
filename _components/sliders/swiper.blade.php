<div {{ $attrs() }}>
    <div {{ $attrs('wrapper') }}>
        {{ $slot }}
    </div>

    @isset ($pagination)
        {{ $pagination }}
    @elseif (target_get($options, 'pagination'))
        <div {{ $attrs('pagination') }}></div>
    @endif

    @isset ($navigation)
        {{ $navigation }}
    @elseif (target_get($options, 'navigation'))
        <div {{ $attrs('button-prev') }}></div>
        <div {{ $attrs('button-next') }}></div>
    @endif

    @isset ($scrollbar)
        {{ $scrollbar }}
    @elseif (target_get($options, 'scrollbar'))
        <div {{ $attrs('scrollbar') }}></div>
    @endif
</div>
