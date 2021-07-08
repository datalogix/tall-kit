<x-form
    {{ $attributes->mergeOnlyThemeProvider($themeProvider, 'container') }}
    :method="$method"
    :action="$action"
    :route="$route"
    :bind="$bind"
    :enctype="$enctype"
    :theme="$theme"
>
    <x-submit
        {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}
        :theme="$theme"
    >
        {!! $slot->isEmpty() ? __($text) : $slot !!}
    </x-submit>
</x-form>
