<form {{
    $init
        ? $attributes
            ->mergeThemeProvider($themeProvider, 'container')
            ->merge(['x-init' => 'setup(\''.__($confirm).'\')'])
        : $attributes
    }}
    method="{{ $spoofMethod ? 'POST' : $method }}"

    @if ($target)
        target="{{ $target }}"
        data-turbo="false"
        data-turbolinks="false"
    @endif

    @if ($action)
        action="{{ $action }}"
    @endif

    @if ($enctype)
        enctype="{{ $enctype }}"
    @elseif (Str::contains($slot, 'type="file"'))
        enctype="multipart/form-data"
    @endif
>
    @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless

    @if ($spoofMethod)
        @method($method)
    @endif

    @bind($bind)
        @if ($fields)
            <x-fields-generator :fields="$fields" />
        @endif

        {{ $slot }}
    @endbind
</form>
