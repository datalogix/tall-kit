<form {{
    $init
        ? $attrs()->merge(['x-init' => 'setup(\''.__($confirm).'\')'])
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

    @if ($fields)
        <x-tallkit-fields-generator
            :attributes="$attrs('fields')"
            :fields="$fields"
            :theme="$theme"
        />
    @endif

    {{ $slot }}
</form>

{{ $endFormDataBinder() }}
