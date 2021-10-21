<form
    {{ $attributes->mergeThemeProvider($themeProvider, 'container') }}
    method="{{ $spoofMethod ? 'POST' : $method }}"
    @if ($action) action="{{ $action }}" @endif
    @if ($confirm) onclick="return confirm('{{ __($confirm) }}')" @endif
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

    {{ $slot }}
</form>

