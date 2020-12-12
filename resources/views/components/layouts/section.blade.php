<div {{ $attributes->merge(toArray($themeProvider->container)) }}>
    <div {{ $themeProvider->content }}>
        @if($title)
            <div {{ $themeProvider->title }}>
                {{ $title }}
            </div>
        @endif

        @if($subtitle)
            <div {{ $themeProvider->subtitle }}>
                {{ $subtitle }}
            </div>
        @endif

        {{ $slot }}
    </div>

    @if(isset($actions))
        <div {{ $themeProvider->actions }}>
            {{ $actions }}
        </div>
    @endif
</div>
