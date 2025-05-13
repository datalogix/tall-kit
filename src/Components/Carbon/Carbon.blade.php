<time {{ $attr() }} datetime="{{ $date }}">
    {{ $human ? $date->diffForHumans() : $date->format(__($format)) }}
</time>
