<div {{ $attr() }}>
    <div {{ $attr('heading') }}>
        <template x-for="(tab, index) in tabs" :key="index">
            <x-tallkit-button :attributes="$attrs('item')" />
        </template>
    </div>

    <div {{ $attr('tabs') }}>
        {{ $slot }}

        <template x-for="(tab, index) in tabs" :key="index">
            <div {{ $attr('tab-item') }}></div>
        </template>
    </div>
</div>
