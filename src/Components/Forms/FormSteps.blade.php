<ul {{ $attr($mode, true) }}>
    @forelse($steps as $pos => $step)
        <x-tallkit-form-step :attributes="$attr('step')">
            @if ($mode === 'vertical')
                {{ $content ?? '' }}
            @endif
        </x-tallkit-form-step>
    @empty
        {{ $slot }}
    @endforelse
</ul>

@if ($mode === 'horizontal')
    {{ $content ?? '' }}
@endif
