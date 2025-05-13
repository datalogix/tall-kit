<div {{ $attrs()->merge(['x-init' => 'setup('.$jsonOptions().')']) }}>
    {{ $prepend ?? '' }}

    @if ($getOptions('displayCreditCard'))
        @isset ($creditCard)
            {{ $creditCard }}
        @else
            <x-tallkit-credit-card
                :attributes="$attrs('credit-card')"
                :theme="$theme"
            />
        @endisset
    @endif

    <div {{ $attrs($getOptions('displayCreditCard') ? 'fields' : 'only-form') }}>
        {{ $slot }}
        {{ $prependFields ?? '' }}

        <x-tallkit-input
            :attributes="$attrs('card-holder-name')"
            required
            name="card_holder_name"
            maxlength="50"
            :theme="$theme"
        />

        <x-tallkit-input
            :attributes="$attrs('card-number')"
            required
            name="card_number"
            maxlength="20"
            :theme="$theme"
        >
            @if ($getOptions('displayCardIcon'))
                <x-slot name="append">
                    @isset ($cardIcon)
                        {{ $cardIcon }}
                    @else
                        <div {{ $attrs('card-icon') }}></div>
                    @endisset
                </x-slot>
            @endif
        </x-tallkit-input>

        <x-tallkit-group
            :attributes="$attrs('card-group')"
            grid="1"
            :theme="$theme"
        >
            @if ($getOptions('displayCardExpirationDate'))
                <x-tallkit-input
                    :attributes="$attrs('card-expiration-date')"
                    required
                    type="text"
                    name="card_expiration_date"
                    maxlength="7"
                    :theme="$theme"
                />
            @else
                <x-tallkit-group
                    :attributes="$attrs('card-expiration-date-group')"
                    label="card_expiration_date"
                    inline
                    :theme="$theme"
                >
                    <x-tallkit-select
                        :attributes="$attrs('card-expiration-month')"
                        required
                        name="card_expiration_month"
                        :label="false"
                        :options="$cardExpirationMonths"
                        :theme="$theme"
                    />
                    <span>/</span>
                    <x-tallkit-select
                        :attributes="$attrs('card-expiration-year')"
                        required
                        name="card_expiration_year"
                        :label="false"
                        :options="$cardExpirationYears"
                        :theme="$theme"
                    />
                </x-tallkit-group>
            @endif

            <x-tallkit-input
                :attributes="$attrs('card-cvv')"
                required
                name="card_cvv"
                maxlength="4"
                :theme="$theme"
            />
        </x-tallkit-group>

        {{ $appendFields ?? '' }}
    </div>

    {{ $append ?? '' }}
</div>
