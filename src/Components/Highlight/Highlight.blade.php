<div {{ $attr() }}>
    <x-tallkit-loading :attributes="$attr('loading')" />

    <pre><!--
        --><code {{ $attr('highlight') }}><!--
            -->{!! $slot->isEmpty() ? $code : $slot !!}<!--
        --></code><!--
    --></pre>
</div>
