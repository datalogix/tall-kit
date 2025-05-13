<div {{ $attrs() }}>
    <x-tallkit-loading
        :attributes="$attrs('loading')"
        :props="$attrs('props')"
        :theme="$theme"
    />

    <pre><!--
        --><code {{ $attrs('highlight') }}><!--
            -->{!! $slot->isEmpty() ? $code : $slot !!}<!--
        --></code><!--
    --></pre>
</div>
