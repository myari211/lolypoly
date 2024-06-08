@foreach ($types as $type)
<label for="" class="tipe mb-3" data-id="{{ $type->id }}"
    data-value="{{ $type->title }}">{{ $type->title }}</label><br>
@endforeach
