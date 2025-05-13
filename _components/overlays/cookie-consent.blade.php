@empty ($_COOKIE[$name])
    <div {{ $attrs() }}>
        <x-tallkit-modal
            :name="$name.'-modal'"
            :overlay="$overlay"
            :closeable="$closeable"
            :align="$align"
            :transition="$transition"
            :attributes="$attrs('modal')"
            :props="$props('modal')"
            :theme="$theme"
        >
            @if ($slot->isEmpty())
                <x-tallkit-section
                    :title="__($title ?? 'This site uses cookies')"
                    :subtitle="$subtitle"
                    :attributes="$attrs('section')"
                    :props="$props('section')"
                    :theme="$theme"
                >
                    <div {{ $attrs('content') }}>
                        @isset ($content)
                            {{ $content }}
                        @else
                            {!! __($description ?? 'Hi! Our website uses cookies so that we can optimize the service we provide you. By using our website, you agree to their use.') !!}

                            <a {{ $attrs('link') }}>
                                {!! __($more ?? 'To learn more, read our cookie policy.') !!}
                            </a>
                        @endisset
                    </div>

                    @isset ($button)
                        {{ $button }}
                    @else
                        <x-tallkit-button
                            :click="'$dispatch(\''.$name.'-close\')'"
                            :text="__($buttonText ?? 'I agree')"
                            :icon="$buttonIcon"
                            :icon-left="$buttonIconLeft"
                            :icon-right="$buttonIconRight"
                            :color="$buttonColor"
                            :rounded="$buttonRounded"
                            :shadow="$buttonShadow"
                            :outlined="$buttonOutlined"
                            :link-text="$buttonLinkText"
                            :bordered="$buttonBordered"
                            :tooltip="$buttonTooltip"
                            :attributes="$attrs('button')"
                            :props="$props('button')"
                            :theme="$theme"
                        />
                    @endisset

                    <x-slot name="actions">
                        {{ $actions ?? '' }}
                    </x-slot>
                </x-tallkit-section>
            @else
                {{ $slot }}
            @endif
        </x-tallkit-modal>
    </div>
@endempty
