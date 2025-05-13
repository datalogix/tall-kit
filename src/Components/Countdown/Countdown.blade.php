<div {{ $attr() }}>
    @if ($slot->isEmpty())
        <span {{ $attr('days') }}>{{ sprintf('%02d', $difference->d) }}</span><!--
        --><span {{ $attr('hours') }}>{{ sprintf('%02d', $difference->h) }}</span>:<!--
        --><span {{ $attr('minutes') }}>{{ sprintf('%02d', $difference->i) }}</span>:<!--
        --><span {{ $attr('seconds') }}>{{ sprintf('%02d', $difference->s) }}</span>
    @else
        {{ $slot }}
    @endif
</div>
