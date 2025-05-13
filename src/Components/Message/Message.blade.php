@if (empty($session) || session()->has($session))
    <div {{ $attr() }} >
        @isset($iconContainer)
            {{ $iconContainer }}
        @elseif ($icon)
            <span {{ $attr('icon-container') }}>
                <x-tallkit-icon :attributes="$attr('icon')" />
            </span>
        @endif

        @isset($dismissibleButton)
            {{ $dismissibleButton }}
        @elseif ($dismissible)
            <x-tallkit-button :attributes="$attr('dismissible')" />
        @endif

        <div>
            @if ($title)
                <div {{ $attr('title') }}>
                    {!! __($title) !!}
                </div>
            @endif

            <div {{ $attr('message') }}>
                {!! $slot->isEmpty() ? __($message) : $slot !!}
            </div>
        </div>
    </div>
@endif
