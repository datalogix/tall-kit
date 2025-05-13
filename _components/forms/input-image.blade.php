<x-tallkit-field
    :name="$name"
    :label="false"
    :show-errors="$showErrors"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    <label {{ $attrs('label') }}>
        <x-tallkit-label
            :label="$label"
            :attributes="$attrs('label-text')"
            :props="$props('label-text')"
            :theme="$theme"
        >
            {{ $labelContent ?? '' }}
        </x-tallkit-label>

        <div {{ $attrs('field') }}>
            <input
                {{ $attrs('input', false) }}

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
                <x-tallkit-button
                    color="none"
                    :text="$emptyText"
                    :icon="$emptyIcon ?? $attrs('empty-icon-name')->first()"
                    :attributes="$attrs('empty')"
                    :props="$props('empty')"
                    :theme="$theme"
                >{{ $slot }}</x-tallkit-button>
            @endisset

            <div {{ $attrs('loading') }}>
                @isset ($loading)
                    {{ $loading }}
                @else
                    <x-tallkit-icon
                        :name="$loadingIcon ?? $attrs('loading-icon-name')->first()"
                        :attributes="$attrs('loading-icon')"
                        :props="$props('loading-icon')"
                        :theme="$theme"
                    >
                        {!! $loadingIcon ?? $attrs('loading-icon-svg')->first() !!}
                    </x-tallkit-icon>
                @endisset
            </div>

            @isset ($error)
                {{ $error }}
            @else
                <x-tallkit-button
                    color="error"
                    :text="$errorText"
                    :icon="$errorIcon ?? $attrs('error-icon-name')->first()"
                    :attributes="$attrs('error')"
                    :props="$props('error')"
                    :theme="$theme"
                />
            @endisset

            <div {{ $attrs('complete') }}>
                <img
                    {{ $attrs('img') }}
                    @if ($value)
                        src="{{ $value }}"
                    @endif
                />

                <div {{ $attrs('actions') }}>
                    @isset ($actions)
                        {{ $actions }}
                    @else
                        @isset ($edit)
                            {{ $edit }}
                        @else
                            <x-tallkit-button
                                preset="none"
                                :attributes="$attrs('edit')"
                                :props="$props('edit')"
                                :theme="$theme"
                            >
                                <x-tallkit-icon
                                    :name="$editIcon ?? $attrs('edit-icon-name')->first()"
                                    :attributes="$attrs('edit-icon')"
                                    :props="$props('edit-icon')"
                                    :theme="$theme"
                                >
                                    {!! $editIcon ?? $attrs('edit-icon-svg')->first() !!}
                                </x-tallkit-icon>
                            </x-tallkit-button>
                        @endisset

                        @isset ($delete)
                            {{ $delete }}
                        @else
                            <x-tallkit-button
                                click="remove('{{ __($deleteConfirm ?? 'Do you really want to remove this image?') }}')"
                                preset="none"
                                :attributes="$attrs('delete')"
                                :props="$props('delete')"
                                :theme="$theme"
                            >
                                 <x-tallkit-icon
                                    :name="$deleteIcon ?? $attrs('delete-icon-name')->first()"
                                    :attributes="$attrs('delete-icon')"
                                    :props="$props('delete-icon')"
                                    :theme="$theme"
                                >
                                    {!! $deleteIcon ?? $attrs('delete-icon-svg')->first() !!}
                                </x-tallkit-icon>
                            </x-tallkit-button>
                        @endisset
                    @endisset
                </div>
            </div>
        </div>
    </label>
</x-tallkit-field>
