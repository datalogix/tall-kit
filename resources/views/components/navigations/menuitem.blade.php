<li {{ $themeProvider->container }}>
    @if($href)
        <a :href="$href" {{ $attributes->merge(toArray($themeProvider->link)) }}>
            <x-icon :name="$iconLeft" :class="$themeProvider->iconLeft" />

            {{ $slot->isEmpty() ? __($text) : $slot }}

            <x-icon :name="$iconRight" :class="$themeProvider->iconRight" />
        </a>
    @else
        <button {{ $attributes->merge(toArray($themeProvider->button)) }}>
            <x-icon :name="$iconLeft" :class="$themeProvider->iconLeft" />

            {{ $slot->isEmpty() ? __($text) : $slot }}

            <x-icon :name="$iconRight" :class="$themeProvider->iconRight" />
        </button>
    @endif
</li>
