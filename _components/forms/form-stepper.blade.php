<x-tallkit-form
    :attributes="$attrs('container', false, [$mode => 'container'])"
    :init="$init"
    :method="$method"
    :target="$target"
    :action="$action"
    :route="$route"
    :bind="$bind"
    :modelable="$modelable"
    :enctype="$enctype"
    :confirm="$confirm"
    :fields="$fields"
    :theme="$theme"
>
    @if ($title)
        <header {{ $attrs('header', true, [$mode => 'header']) }}>
            {!! __($title) !!}
        </header>
    @endif

    <x-tallkit-form-steps
        :attributes="$attrs('steps', true, [$mode => 'steps'])"
        :mode="$mode"
        :steps="$steps"
        :current="$current"
        :theme="$theme"
    >
        <x-slot name="content">
            <x-tallkit-card
                :attributes="$attrs('card', true, [$mode => 'card'])"
                :theme="$theme"
            >
                @isset ($header)
                    <x-slot name="header">
                        {{ $header }}
                    </x-slot>
                @endisset

                {{ $slot }}

                <x-slot name="footer">
                    @isset ($actions)
                        {{ $actions }}
                    @else
                        <div {{ $attrs('actions', true, [$mode => 'actions', $isWired() ? 'wire' : null => 'actions']) }}>
                            @if ($prev)
                                <x-tallkit-button
                                    preset="prev"
                                    :attributes="
                                        $attrs('prev', true, [$mode => 'prev', $isWired() ? 'wire' : null => 'prev'])
                                            ->merge($current > 1 ? [] : ['style' => 'display:none;'])
                                    "
                                    :theme="$theme"
                                />
                            @endif

                            @if ($next)
                                <x-tallkit-submit
                                    preset="next"
                                    :attributes="
                                        $attrs('next', true, [$mode => 'next', $isWired() ? 'wire' : null => 'next'])
                                            ->merge($current > 1 ? [] : ['style' => 'display:none;'])
                                    "
                                    :theme="$theme"
                                />
                            @endif
                        </div>

                        @if ($loading && $isWired())
                            <div {{ $attrs('loading', true, [$mode => 'loading', $isWired() ? 'wire' : null => 'loading']) }}>
                                <x-tallkit-loading :theme="$theme" />
                            </div>
                        @endif
                    @endisset
                </x-slot>
            </x-tallkit-card>
        </x-slot>
    </x-tallkit-form-steps>
</x-tallkit-form>

{{ $endFormDataBinder() }}
