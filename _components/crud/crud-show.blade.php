<div {{ $attrs() }}>
    @isset ($header)
        {{ $header }}
    @else
        <x-tallkit-crud-header
            :title="$title"
            :attributes="$attrs('header')"
            :props="$props('header')"
            :theme="$theme"
        >
            @isset ($actionsHeader)
                {{ $actionsHeader }}
            @elseif (isset($actionsShow))
                {{ $actionsShow }}
            @else
                <x-tallkit-crud-actions
                    :prefix="$prefix"
                    :key="$key"
                    :title="$title"
                    :parameters="array_merge($parameters, [$resource])"
                    :resource="$resource"
                    :force-menu="$forceMenu"
                    :max-actions="$maxActions"
                    :actions="$actions"
                    :route-name="$routeName"
                    :tooltip="$tooltip"
                    :attributes="$attrs('header-actions')"
                    :props="$props('header-actions')"
                    :theme="$theme"
                />

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
        {{ $slot }}
    </x-tallkit-card>

    <div {{ $attrs('footer') }}>
        @isset($actionsFooter)
            {{ $actionsFooter }}
        @elseif(isset($actionsShow))
            {{ $actionsShow }}
        @else
            <x-tallkit-crud-actions
                :prefix="$prefix"
                :key="$key"
                :title="$title"
                :parameters="array_merge($parameters, [$resource])"
                :resource="$resource"
                :force-menu="$forceMenu"
                :max-actions="$maxActions"
                :actions="$actions"
                :route-name="$routeName"
                :tooltip="$tooltip"
                :attributes="$attrs('footer-actions')"
                :props="$props('footer-actions')"
                :theme="$theme"
            />

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
</div>

{{ $endFormDataBinder() }}
