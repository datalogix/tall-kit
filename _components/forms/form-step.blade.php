<li {{ $attrs('container', false, [
    $active ? 'active' ($completed ? 'completed' : 'uncompleted') => null,
    $mode => 'container',
    $mode => $active ? 'active' : ($completed ? 'completed' : 'uncompleted')
]) }}>
    <div {{ $attrs('step', true, [$mode => 'step']) }}>
        <span {{ $attrs('pointer', true, [$mode=> 'pointer', 'pointer-status' => $active ? 'active' : ($completed ? 'completed' : 'uncompleted')]) }}>
            @if ($icon)
                <x-tallkit-icon
                    :attributes="$attrs('icon', true, [$mode=> 'icon'])"
                    :name="$icon"
                    :theme="$theme"
                >
                    {!! $icon !!}
                </x-tallkit-icon>
            @else
                {!! __($label) !!}
            @endif
        </span>

        <div {{ $attrs('content', true, [$mode=> 'content', 'content-status' => $active ? 'active' : ($completed ? 'completed' : 'uncompleted')]) }}>
            @if ($title)
                <span {{ $attrs('title', true, [$mode=> 'title']) }}>
                    {!! __($title) !!}
                </span>
            @endif

            @if ($subtitle)
                <span {{ $attrs('subtitle', true, [$mode=> 'subtitle']) }}>
                    {!! __($subtitle) !!}
                </span>
            @endif
        </div>
    </div>

    @if ($active && $mode === 'vertical')
        {{ $slot }}
    @endif
</li>
