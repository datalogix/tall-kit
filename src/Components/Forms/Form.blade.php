<form {{ $attr()->merge(!$enctype && Str::contains($slot, 'type="file"') ? ['enctype' => 'multipart/form-data'] : []) }}>
    @unless(in_array($method, ['HEAD', 'GET', 'OPTIONS']))
        @csrf
    @endunless

    @if ($spoofMethod)
        @method($method)
    @endif

    @if ($fields)
        <x-tallkit-fields-generator :attributes="$attr('fields')" />
    @endif

    {{ $slot }}
</form>
