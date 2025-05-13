<div {{ $attr() }}>
    @isset ($header)
        {{ $header }}
    @else
        <x-tallkit-crud-header :attributes="$attr('header')">
            @isset ($actionsHeader)
                {{ $actionsHeader }}
            @elseif (isset($actionsShow))
                {{ $actionsShow }}
            @else
                <x-tallkit-crud-actions :attributes="$attr('header-actions')" />

                @if ($back !== false)
                    <x-tallkit-back :attributes="$attr('header-back')" />
                @endif
            @endisset
        </x-tallkit-crud-header>
    @endisset

    <x-tallkit-card :attributes="$attr('content')">
        {{ $slot }}
    </x-tallkit-card>

    <div {{ $attr('footer') }}>
        @isset($actionsFooter)
            {{ $actionsFooter }}
        @elseif(isset($actionsShow))
            {{ $actionsShow }}
        @else
            <x-tallkit-crud-actions :attributes="$attr('footer-actions')" />

            @if ($back !== false)
                <x-tallkit-back :attributes="$attr('footer-back')" />
            @endif
        @endisset
    </div>
</div>
