@foreach($messages as $message)
    <x-tallkit-message
        :options="$message"
        :attributes="$attrs()"
        :props="$props()"
        :theme="$theme"
    />
@endforeach
