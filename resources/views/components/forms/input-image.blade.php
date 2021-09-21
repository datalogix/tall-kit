<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :label="false"
    :showErrors="$showErrors"
    :theme="$theme"
>
    <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
        <x-label
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'labelText') }}
            :label="$label"
            :theme="$theme"
        >
            {{ $labelContent ?? '' }}
        </x-label>

        <div {{ $attributes->mergeThemeProvider($themeProvider, 'field') }}>
            <input
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'input') }}

                @if ($name)
                    name="{{ $name }}"
                @endif

                @if ($accept)
                    accept="{{ $accept }}"
                @endif

                @if ($id)
                    id="{{ $id }}"
                @endif

                @if ($isWired() && $name)
                    wire:model{!! $wireModifier() !!}="{{ $name }}"
                @endif
            />

            @isset ($empty)
                {{ $empty }}
            @else
                <x-button
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'empty') }}
                    color="blue"
                    :text="$emptyText"
                    :icon="$emptyIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'emptyIconSvg')->first()"
                    :theme="$theme"
                >{{ $slot }}</x-button>
            @endisset

            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading') }}>
                @isset ($loading)
                    {{ $loading }}
                @else
                    <x-icon
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loadingIcon') }}
                        :name="$loadingIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'loadingIconName')->first()"
                    >
                        {!! $loadingIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'loadingIconSvg')->first() !!}
                    </x-icon>
                @endisset
            </div>

            @isset ($error)
                {{ $error }}
            @else
                <x-button
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'error') }}
                    color="error"
                    :text="$errorText"
                    :icon="$errorIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'errorIconSvg')->first()"
                    :theme="$theme"
                />
            @endisset

            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'complete') }}>
                <img
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'img') }}
                    @if ($value)
                        src="{{ $value }}"
                    @endif
                />

                <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'actions') }}>
                    @isset ($actions)
                        {{ $actions }}
                    @else
                        @isset ($edit)
                            {{ $edit }}
                        @else
                            <x-button
                                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'edit') }}
                                color="transparent"
                                shadow="none"
                                :theme="$theme"
                            >
                                <x-icon
                                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'editIcon') }}
                                    :name="$editIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'editIconName')->first()"
                                >
                                    {!! $editIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'editIconSvg')->first() !!}
                                </x-icon>
                            </x-button>
                        @endisset

                        @isset ($delete)
                            {{ $delete }}
                        @else
                            <x-button {{
                                $attributes
                                    ->mergeOnlyThemeProvider($themeProvider, 'delete')
                                    ->merge(['@click' => 'destroy(\''.__('Do you really want to remove this image?').'\')'])
                                }}
                                color="transparent"
                                shadow="none"
                                :theme="$theme"
                            >
                                <x-icon
                                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'deleteIcon') }}
                                    :name="$deleteIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'deleteIconName')->first()"
                                >
                                    {!! $deleteIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'deleteIconSvg')->first() !!}
                                </x-icon>
                            </x-button>
                        @endisset
                    @endisset
                </div>
            </div>
        </div>
    </label>
</x-field>
