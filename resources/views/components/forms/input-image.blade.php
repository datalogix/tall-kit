<x-field
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :theme="$theme"
>
    <label {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label') }}>
        <x-label
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'label-text') }}
            :label="$label"
            :theme="$theme"
        >
            {{ $labelContent ?? '' }}
        </x-label>

        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'field') }}>
            <input
                {{ $attributes->mergeThemeProvider($themeProvider, 'input') }}

                @if ($name)
                    name="{{ $name }}"
                @endif

                @if ($accept)
                    accept="{{ $accept }}"
                @endif

                @if ($id)
                    id="{{ $id }}"
                @endif

                @if ($isModel() && $name)
                    x-model{!! $modelModifier($modifier) !!}="{{ $modelName($name) }}"
                @endif

                @if ($isWired() && $name)
                    wire:model{!! $wireModifier($modifier) !!}="{{ $name }}"
                @endif
            />

            @isset ($empty)
                {{ $empty }}
            @else
                <x-button
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'empty') }}
                    color="none"
                    :text="$emptyText"
                    :icon="$emptyIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'empty-icon-name')->first()"
                    :theme="$theme"
                >{{ $slot }}</x-button>
            @endisset

            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading') }}>
                @isset ($loading)
                    {{ $loading }}
                @else
                    <x-icon
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'loading-icon') }}
                        :name="$loadingIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'loading-icon-name')->first()"
                    >
                        {!! $loadingIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'loading-icon-svg')->first() !!}
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
                    :icon="$errorIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'error-icon-name')->first()"
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
                                preset="none"
                                :theme="$theme"
                            >
                                <x-icon
                                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'edit-icon') }}
                                    :name="$editIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'edit-icon-name')->first()"
                                >
                                    {!! $editIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'edit-icon-svg')->first() !!}
                                </x-icon>
                            </x-button>
                        @endisset

                        @isset ($delete)
                            {{ $delete }}
                        @else
                            <x-button
                                {{ $attributes ->mergeOnlyThemeProvider($themeProvider, 'delete') }}
                                click="remove('{{ __($deleteConfirm ?? 'Do you really want to remove this image?') }}')"
                                preset="none"
                                :theme="$theme"
                            >
                                <x-icon
                                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'delete-icon') }}
                                    :name="$deleteIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'delete-icon-name')->first()"
                                >
                                    {!! $deleteIcon ?? $attributes->mergeOnlyThemeProvider($themeProvider, 'delete-icon-svg')->first() !!}
                                </x-icon>
                            </x-button>
                        @endisset
                    @endisset
                </div>
            </div>
        </div>
    </label>
</x-field>
