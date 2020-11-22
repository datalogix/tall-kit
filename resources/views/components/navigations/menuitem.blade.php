<li :class="$themeProvider->container">
    @if($href)
        <a :href="$href" {{ $attributes->merge($themeProvider->link->toArray()) }}>
            <x-icon :name="$iconLeft" :class="$themeProvider->iconLeft" />

            {{ $slot->isEmpty() ? __($text) : $slot }}

            <x-icon :name="$iconRight" :class="$themeProvider->iconRight" />
        </a>
    @else
        <button {{ $attributes->merge($themeProvider->button->toArray()) }}>
            <x-icon :name="$iconLeft" :class="$themeProvider->iconLeft" />

            {{ $slot->isEmpty() ? __($text) : $slot }}

            <x-icon :name="$iconRight" :class="$themeProvider->iconRight" />
        </button>
    @endif
</li>
