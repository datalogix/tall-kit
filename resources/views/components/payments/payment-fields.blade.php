<div {{
    $attributes
        ->mergeThemeProvider($themeProvider, 'container')
        ->merge(['x-init' => 'setup('.$jsonOptions().')'])
}}>
    {{ $prepend ?? '' }}

    @if ($getOptions('displayCreditCard'))
        @isset ($creditCard)
            {{ $creditCard }}
        @else
            <x-credit-card {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'credit-card') }} />
        @endisset
    @endif

    <div {{
        $attributes
            ->mergeOnlyThemeProvider($themeProvider, 'fields', $getOptions('displayCreditCard') ? 'default' : 'only-form')
    }}>
        {{ $slot }}
        {{ $prependFields ?? '' }}

        <x-input
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'card-holder-name') }}
            required
            name="card_holder_name"
            maxlength="50"
        />

        <x-input
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'card-number') }}
            required
            name="card_number"
            maxlength="20"
        >
            @if ($getOptions('displayCardIcon'))
                <x-slot name="append">
                    @isset ($cardIcon)
                        {{ $cardIcon }}
                    @else
                        <div {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'card-icon') }}></div>
                    @endisset
                </x-slot>
            @endif
        </x-input>

        <x-group
            {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'card-group') }}
            grid="1"
        >
            @if ($getOptions('displayCardExpirationDate'))
                <x-input
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'card-expiration-date') }}
                    required
                    type="text"
                    name="card_expiration_date"
                    maxlength="7"
                />
            @else
                <x-group
                    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'card-expiration-date-group') }}
                    label="card_expiration_date"
                    inline
                >
                    <x-select
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'card-expiration-month') }}
                        required
                        name="card_expiration_month"
                        :label="false"
                        :options="$cardExpirationMonths"
                    />
                    <span>/</span>
                    <x-select
                        {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'card-expiration-year') }}
                        required
                        name="card_expiration_year"
                        :label="false"
                        :options="$cardExpirationYears"
                    />
                </x-group>
            @endif

            <x-input
                {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'card-cvv') }}
                required
                name="card_cvv"
                maxlength="4"
            />
        </x-group>

        {{ $appendFields ?? '' }}
    </div>

    {{ $append ?? '' }}
</div>
