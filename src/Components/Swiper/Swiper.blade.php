<div {{ $attr() }}>
    <div {{ $attr('wrapper') }}>
        {{ $slot }}
    </div>

    @isset ($pagination)
        {{ $pagination }}
    @elseif (target_get($options, 'pagination'))
        <div {{ $attr('pagination') }}></div>
    @endif

    @isset ($navigation)
        {{ $navigation }}
    @elseif (target_get($options, 'navigation'))
        <div {{ $attr('button-prev') }}></div>
        <div {{ $attr('button-next') }}></div>
    @endif

    @isset ($scrollbar)
        {{ $scrollbar }}
    @elseif (target_get($options, 'scrollbar'))
        <div {{ $attr('scrollbar') }}></div>
    @endif
</div>
