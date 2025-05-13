<x-tallkit-form :attributes="$attr()">
    @isset($header)
        {{ $header }}
    @else
        <x-tallkit-crud-header :attributes="$attr('header')">
            @isset($actionsHeader)
                {{ $actionsHeader }}
            @elseif(isset($actionsForm))
                {{ $actionsForm }}
            @else
                @if ($action !== false)
                    <x-tallkit-submit :attributes="$attr('header-save')" />

                    @if (Route::has($prefix.'.show') || Route::has($prefix.'.view'))
                        @can(['show', 'view'], $model)
                            <x-tallkit-submit :attributes="$attr('header-save-and-view')" />
                        @endcan
                    @endif
                @endif

                @if ($back !== false)
                    <x-tallkit-back :attributes="$attr('header-back')" />
                @endif
            @endisset
        </x-tallkit-crud-header>
    @endisset

   <x-tallkit-card :attributes="$attr('content')">
        @if ($fields)
            <x-tallkit-fields-generator :attributes="$attr('fields')" />
        @endif

        {{ $slot }}
    </x-tallkit-card>

    <div {{ $attr('footer') }}>
        @isset($actionsFooter)
            {{ $actionsFooter }}
        @elseif(isset($actionsForm))
            {{ $actionsForm }}
        @else
            @if ($action !== false)
                <x-tallkit-submit :attributes="$attr('footer-save')" />

                @if (Route::has($prefix.'.show') || Route::has($prefix.'.view'))
                    @can(['show', 'view'], $model)
                        <x-tallkit-submit :attributes="$attr('footer-save-and-view')" />
                    @endcan
                @endif
            @endif

            @if ($back !== false)
                <x-tallkit-back :attributes="$attr('footer-back')" />
            @endif
        @endisset
    </div>
</x-tallkit-form>
