<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$selected.')'])
}}>
    <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'heading') }}>
        <template x-for="(tab, index) in tabs" :key="index">
            <x-button {{
                $attributes
                    ->mergeOnlyThemeProvider($themeProvider, 'item')
                    ->mergeOnlyThemeProvider($themeProvider, 'modes-item', $mode)
                }}
                color="none"
                shadow="none"
                rounded="none"
                :theme="$theme"
                ::class="{
                    '{{ $attributes
                        ->mergeOnlyThemeProvider($themeProvider, 'selected')
                        ->mergeOnlyThemeProvider($themeProvider, 'modes-selected', $mode)
                        ->first()
                    }}': isSelected(tab),

                    '{{ $attributes
                        ->mergeOnlyThemeProvider($themeProvider, 'disabled')
                        ->mergeOnlyThemeProvider($themeProvider, 'modes-disabled', $mode)
                        ->first()
                    }}': isDisabled(tab),
                }"
            ></x-button>
        </template>
    </div>

    <div {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'tabs')
            ->mergeOnlyThemeProvider($themeProvider, 'modes-tabs', $mode)
    }}>
        {{ $slot }}

        <template x-for="(tab, index) in tabs" :key="index">
            <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'tab-item') }}></div>
        </template>
    </div>
</div>
