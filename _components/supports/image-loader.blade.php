
<div {{ $attrs() }}>
    @if ($url)
        <img
            {{ $attrs('image') }}
            src="{{ cache($url) }}"
        />
    @endif

    <x-tallkit-loading
        :attributes="$attrs('loading')"
        :props="$props('loading')"
        :theme="$theme"
    />

    @if ($icon)
        <x-tallkit-icon
            :name="$icon"
            :attributes="$attrs('icon')"
            :props="$props('icon')"
            :theme="$theme"
        />
    @else
        @isset ($loading)
            <div {{ $attrs('loading') }}>
                {{ $loading }}
            </div>
        @else
            <x-tallkit-loading
                :attributes="$attrs('loading')"
                :props="$props('loading')"
                :theme="$theme"
            />
        @endisset

        @isset ($error)
            <div {{ $attrs('error') }}>
                {{ $error }}
            </div>
        @else
            <x-tallkit-error
                :attributes="$attrs('error')"
                :props="$props('error')"
                :theme="$theme"
            />
        @endisset
    @endisset
</div>
