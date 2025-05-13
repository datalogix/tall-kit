<div {{ $attrs() }}>
    <div {{ $attrs('heading') }}>
        <template x-for="(tab, index) in tabs" :key="index">
            <x-tallkit-button
                :attributes="$attrs('item')"
                :props="$props('item')"
                :theme="$theme"
            />
        </template>
    </div>

    <div {{ $attrs('tabs') }}>
        {{ $slot }}

        <template x-for="(tab, index) in tabs" :key="index">
            <div {{ $attrs('tab-item') }}></div>
        </template>
    </div>
</div>
