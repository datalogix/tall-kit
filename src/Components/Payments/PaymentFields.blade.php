<div {{ $attr() }}>
    {{ $prepend ?? '' }}

    @if ($getOptions('displayCreditCard'))
        @isset ($creditCard)
            {{ $creditCard }}
        @else
            <x-tallkit-credit-card :attributes="$attr('credit-card')" />
        @endisset
    @endif

    <div {{ $attr($getOptions('displayCreditCard') ? 'fields' : 'only-form') }}>
        {{ $slot }}
        {{ $prependFields ?? '' }}

        <x-tallkit-input :attributes="$attr('card-holder-name')" />

        <x-tallkit-input :attributes="$attr('card-number')">
            @if ($getOptions('displayCardIcon'))
                <x-slot name="append">
                    @isset ($cardIcon)
                        {{ $cardIcon }}
                    @else
                        <div {{ $attr('card-icon') }}></div>
                    @endisset
                </x-slot>
            @endif
        </x-tallkit-input>

        <x-tallkit-group :attributes="$attr('card-group')">
            @if ($getOptions('displayCardExpirationDate'))
                <x-tallkit-input :attributes="$attr('card-expiration-date')" />
            @else
                <x-tallkit-group :attributes="$attr('card-expiration-date-group')">
                    <x-tallkit-select :attributes="$attr('card-expiration-month')" />
                    <span>/</span>
                    <x-tallkit-select :attributes="$attr('card-expiration-year')" />
                </x-tallkit-group>
            @endif

            <x-tallkit-input :attributes="$attr('card-cvv')" />
        </x-tallkit-group>

        {{ $appendFields ?? '' }}
    </div>

    {{ $append ?? '' }}
</div>
