@foreach($messages as $message)
    <x-tallkit-message :attributes="$attr()->merge($message)" />
@endforeach
