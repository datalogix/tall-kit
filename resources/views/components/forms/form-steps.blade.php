<ul {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->mergeOnlyThemeProvider($themeProvider, $mode, 'container')
    }}
>
    @forelse($steps as $pos => $step)
        <x-form-step {{
            $attributes
                ->mergeOnlyThemeProvider($themeProvider, 'step')
                ->mergeOnlyThemeProvider($themeProvider, $mode, 'step')
            }}
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
        </x-form-step>
    @empty
        {{ $slot }}
    @endforelse
</ul>

@if ($mode === 'horizontal')
    {{ $content ?? '' }}
@endif

@once
    @push('styles')
        <style>
            .form-steps-horizontal li:not(:last-child):after {
                position: relative;
                flex: 1;
                height: 2px;
                content: '';
                top: 20px;
            }
            .form-steps-horizontal li:last-child {
                flex: unset;
            }
            .form-steps-vertical li:not(:last-child):after {
                position: absolute;
                left: 14px;
                top: 36px;
                content: '';
                height: 100%;
                width: 0;
                border-left: 2px solid;
                z-index: 10;
            }

            .form-steps-horizontal li.active:not(:last-child):after {
                background-color: rgb(209 213 219);
            }

            .form-steps-horizontal li.completed:not(:last-child):after {
                background-color: rgb(59 130 246);
            }

            .form-steps-horizontal li.uncompleted:not(:last-child):after {
                background-color: rgb(209 213 219);
            }

            .form-steps-vertical li.active:not(:last-child):after {
                border-color: rgb(209 213 219);
            }

            .form-steps-vertical li.completed:not(:last-child):after {
                border-color: rgb(59 130 246);
            }

            .form-steps-vertical li.uncompleted:not(:last-child):after {
                border-color:  rgb(209 213 219);
            }
        </style>
    @endpush
@endonce
