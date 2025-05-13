<x-tallkit-form
    :init="$init"
    :method="$method"
    :action="$action"
    :route="$route"
    :bind="$resource"
    :modelable="$modelable"
    :enctype="$enctype"
    :confirm="$confirm"
    :attributes="$attrs()"
    :props="$props()"
    :theme="$theme"
>
    @isset($header)
        {{ $header }}
    @else
        <x-tallkit-crud-header
            :title="$title"
            :attributes="$attrs('header')"
            :props="$props('header')"
            :theme="$theme"
        >
            @isset($actionsHeader)
                {{ $actionsHeader }}
            @elseif(isset($actionsForm))
                {{ $actionsForm }}
            @else
                @if ($action !== false)
                    <x-tallkit-submit
                        preset="save"
                        :text="$tooltip ? '' : null"
                        :tooltip="$tooltip"
                        :attributes="$attrs('header-save')"
                        :props="$props('header-save')"
                        :theme="$theme"
                    />

                    @if (Route::has($prefix.'.show') || Route::has($prefix.'.view'))
                        @can(['show', 'view'], $model)
                            <x-tallkit-submit
                                preset="save-and-view"
                                :text="$tooltip ? '' : null"
                                :tooltip="$tooltip"
                                :attributes="$attrs('header-save-and-view')"
                                :props="$props('header-save-and-view')"
                                :theme="$theme"
                            />
                        @endcan
                    @endif
                @endif

                @if ($back !== false)
                    <x-tallkit-back
                        preset="back-right"
                        :href="$back"
                        :text="$tooltip ? '' : null"
                        :tooltip="$tooltip"
                        :attributes="$attrs('header-back')"
                        :props="$props('header-back')"
                        :theme="$theme"
                    />
                @endif
            @endisset
        </x-tallkit-crud-header>
    @endisset

   <x-tallkit-card
        :attributes="$attrs('content')"
        :props="$props('content')"
        :theme="$theme"
    >
        @if ($fields)
            <x-tallkit-fields-generator
                :fields="$fields"
                :attributes="$attrs('fields')"
                :props="$props('fields')"
                :theme="$theme"
            />
        @endif

        {{ $slot }}
    </x-tallkit-card>

    <div {{ $attrs('footer') }}>
        @isset($actionsFooter)
            {{ $actionsFooter }}
        @elseif(isset($actionsForm))
            {{ $actionsForm }}
        @else
            @if ($action !== false)
                <x-tallkit-submit
                    preset="save"
                    :text="$tooltip ? '' : null"
                    :tooltip="$tooltip"
                    :attributes="$attrs('footer-save')"
                    :props="$props('footer-save')"
                    :theme="$theme"
                />

                @if (Route::has($prefix.'.show') || Route::has($prefix.'.view'))
                    @can(['show', 'view'], $model)
                        <x-tallkit-submit
                            preset="save-and-view"
                            :text="$tooltip ? '' : null"
                            :tooltip="$tooltip"
                            :attributes="$attrs('footer-save-and-view')"
                            :props="$props('footer-save-and-view')"
                            :theme="$theme"
                        />
                    @endcan
                @endif
            @endif

            @if ($back !== false)
                <x-tallkit-back
                    preset="back-right"
                    :href="$back"
                    :text="$tooltip ? '' : null"
                    :tooltip="$tooltip"
                    :attributes="$attrs('footer-back')"
                    :props="$props('footer-back')"
                    :theme="$theme"
                />
            @endif
        @endisset
    </div>
</x-tallkit-form>

{{ $endFormDataBinder() }}
