<div {{ $attrs() }}>
    @if ($slot->isEmpty())
        <span {{ $attrs('days') }}>{{ $days() }}</span>:<!--
        --><span {{ $attrs('hours') }}>{{ $hours() }}</span>:<!--
        --><span {{ $attrs('minutes') }}>{{ $minutes() }}</span>:<!--
        --><span {{ $attrs('seconds') }}>{{ $seconds() }}</span>
    @else
        {{ $slot }}
    @endif
</div>
