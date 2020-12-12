<div {{ $attributes->merge(toArray($themeProvider->container)) }}>
    <div {{ $themeProvider->section }}>
        <x-section :title="$title" :subtitle="$subtitle" :class="$themeProvider->title">
            {{ $description ?? '' }}
        </x-section>
    </div>

    <div {{ $themeProvider->form }}>
        <x-card>
            {{ $slot ?? '' }}

            @if(isset($actions))
                <x-slot name="footer">
                    {{ $actions }}
                </x-slot>
            @endif
        </x-card>
    </div>
</div>
