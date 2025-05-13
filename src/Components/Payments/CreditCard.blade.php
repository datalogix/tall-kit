<div {{ $attr() }}>
    <div {{ $attr('front') }}>
        <div {{ $attr('icon') }}></div>

        @isset ($frontSvg)
            {{ $frontSvg }}
        @else
            <svg {{ $attr('front-svg') }}>
                <g>
                    <g>
                        <g>
                            <g>
                                <path
                                    class="transition duration-500"
                                    :class="typeOptions.lightcolor"
                                    d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40 C0,17.9,17.9,0,40,0z"
                                />
                            </g>
                        </g>
                        <path
                            class="transition duration-500"
                            :class="typeOptions.darkcolor"
                            d="M750,431V193.2c-217.6-57.5-556.4-13.5-750,24.9V431c0,22.1,17.9,40,40,40h670C732.1,471,750,453.1,750,431z"
                        />
                    </g>

                    <text
                        transform="matrix(1 0 0 1 60.106 295.0121)"
                        class="fill-white font-mono font-semibold text-5xl"
                        x-text="options.number ? options.number : '0000 0000 0000 0000'"
                    ></text>

                    <text
                        transform="matrix(1 0 0 1 54.1064 428.1723)"
                        class="fill-white font-mono font-normal uppercase text-3xl"
                        x-text="options.holderName ? options.holderName : '{{ __('card_holder_name') }}'"
                    ></text>

                    <text
                        transform="matrix(1 0 0 1 54.1074 389.8793)"
                        class="fill-white opacity-60 font-mono font-normal text-2xl"
                    >{{ __('card_holder_name') }}</text>

                    <text
                        transform="matrix(1 0 0 1 479.7754 388.8793)"
                        class="fill-white opacity-60 font-mono font-normal text-2xl"
                    >{{ __('validity') }}</text>

                    <text
                        transform="matrix(1 0 0 1 65.1054 241.5)"
                        class="fill-white opacity-60 font-mono font-normal text-2xl"
                    >{{ __('card_number') }}</text>

                    <g>
                        <text
                            transform="matrix(1 0 0 1 574.4219 433.8095)"
                            class="fill-white font-mono text-3xl font-normal"
                            x-text="options.expirationDate ? options.expirationDate : 'MM/YYYY'"
                        ></text>

                        <text
                            transform="matrix(1 0 0 1 479.3848 417.0097)"
                            class="fill-white font-mono font-light text-base"
                        >VALID</text>

                        <text
                            transform="matrix(1 0 0 1 479.3848 435.6762)"
                            class="fill-white font-mono font-light text-base"
                        >THRU</text>

                        <polygon
                            class="fill-white"
                            points="554.5,421 540.4,414.2 540.4,427.9"
                        />
                    </g>
                    <g>
                        <g>
                            <path
                                class="fill-white"
                                d="M168.1,143.6H82.9c-10.2,0-18.5-8.3-18.5-18.5V74.9c0-10.2,8.3-18.5,18.5-18.5h85.3 c10.2,0,18.5,8.3,18.5,18.5v50.2C186.6,135.3,178.3,143.6,168.1,143.6z"
                            />
                        </g>
                        <g>
                            <g><rect x="82" y="70" width="1.5" height="60" /></g>
                            <g><rect x="167.4" y="70" width="1.5" height="60" /></g>
                            <g><path d="M125.5,130.8c-10.2,0-18.5-8.3-18.5-18.5c0-4.6,1.7-8.9,4.7-12.3c-3-3.4-4.7-7.7-4.7-12.3 c0-10.2,8.3-18.5,18.5-18.5s18.5,8.3,18.5,18.5c0,4.6-1.7,8.9-4.7,12.3c3,3.4,4.7,7.7,4.7,12.3 C143.9,122.5,135.7,130.8,125.5,130.8z M125.5,70.8c-9.3,0-16.9,7.6-16.9,16.9c0,4.4,1.7,8.6,4.8,11.8l0.5,0.5l-0.5,0.5 c-3.1,3.2-4.8,7.4-4.8,11.8c0,9.3,7.6,16.9,16.9,16.9s16.9-7.6,16.9-16.9c0-4.4-1.7-8.6-4.8-11.8l-0.5-0.5l0.5-0.5 c3.1-3.2,4.8-7.4,4.8-11.8C142.4,78.4,134.8,70.8,125.5,70.8z" /></g>
                            <g><rect x="82.8" y="82.1" width="25.8" height="1.5" /></g>
                            <g><rect x="82.8" y="117.9" width="26.1" height="1.5" /></g>
                            <g><rect x="142.4" y="82.1" width="25.8" height="1.5" /></g>
                            <g><rect x="142" y="117.9" width="26.2" height="1.5" /></g>
                        </g>
                    </g>
                </g>
            </svg>
        @endisset
    </div>

    <div {{ $attr('back') }}>
        @isset ($backSvg)
            {{ $backSvg }}
        @else
            <svg {{ $attr('back-svg') }}>
                <g>
                    <g>
                        <g>
                            <path
                                class="transition duration-500"
                                :class="typeOptions.darkcolor"
                                d="M40,0h670c22.1,0,40,17.9,40,40v391c0,22.1-17.9,40-40,40H40c-22.1,0-40-17.9-40-40V40 C0,17.9,17.9,0,40,0z"
                            />
                        </g>
                    </g>
                    <rect
                        y="61.6"
                        class="fill-gray-900"
                        width="750"
                        height="78"
                    />
                    <g>
                        <path
                            class="fill-gray-50"
                            d="M701.1,249.1H48.9c-3.3,0-6-2.7-6-6v-52.5c0-3.3,2.7-6,6-6h652.1c3.3,0,6,2.7,6,6v52.5 C707.1,246.4,704.4,249.1,701.1,249.1z"
                        />
                        <rect
                            x="42.9"
                            y="198.6"
                            class="fill-gray-200"
                            width="664.1"
                            height="10.5"
                        />
                        <rect
                            x="42.9"
                            y="224.5"
                            class="fill-gray-200"
                            width="664.1"
                            height="10.5"
                        />
                        <path
                            class="fill-gray-200"
                            d="M701.1,184.6H618h-8h-10v64.5h10h8h83.1c3.3,0,6-2.7,6-6v-52.5C707.1,187.3,704.4,184.6,701.1,184.6z"
                        />
                    </g>
                    <text
                        transform="matrix(1 0 0 1 621.999 227.2734)"
                        class="font-mono font-normal text-3xl"
                        x-text="options.cvv ? options.cvv : '123'"
                    ></text>
                    <rect
                        x="58.1"
                        y="378.6"
                        class="fill-gray-200"
                        width="375.5"
                        height="13.5"
                    />
                    <rect
                        x="58.1"
                        y="405.6"
                        class="fill-gray-200"
                        width="421.7"
                        height="13.5"
                    />
                    <text
                        transform="matrix(1 0 0 1 59.5073 228.6099)"
                        class="text-4xl"
                        style="font-family: cursive"
                        x-text="options.holderName ? options.holderName : '{{ __('card_holder_name') }}'"
                    ></text>
                </g>
            </svg>
        @endisset
    </div>
</div>
