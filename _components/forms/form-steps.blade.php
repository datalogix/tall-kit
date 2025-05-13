<ul {{ $attrs('container', false, [$mode => 'container']) }}>
    @forelse($steps as $pos => $step)
        <x-tallkit-form-step
            :attributes="$attrs('step', true, [$mode => 'step'])"
            :label="target_get($step, ['label', 'position', 'number'], intval($pos) + 1)"
            :title="target_get($step, ['title', 'name'])"
            :subtitle="target_get($step, ['subtitle', 'text'])"
            :icon="target_get($step, 'icon')"
            :mode="$mode"
            :active="$pos === $current - 1"
            :completed="$pos < $current - 1"
            :uncompleted="$pos > $current - 1"
            :theme="$theme"
        >
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
