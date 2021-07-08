<x-form-button
    {{ $attributes->mergeThemeProvider($themeProvider, 'button') }}
    :method="$method"
    :action="$action"
    :route="$route"
    :bind="$bind"
    :enctype="$enctype"
    :theme="$theme"
>
    {!! $slot->isEmpty() ? __($text) : $slot !!}
</x-form-button>
