@foreach ($data as $dt)
    <div class="col-md-3">
        <img src="{{ asset($dt->image) }}" alt="" class="img-fluid rounded case aspect-ration-one" data-value="{{ $dt->title }}"
            data-id="{{ $dt->id }}" data-price="{{ $dt->price }}" data-src="{{ asset($dt->image) }}"
            data-price="{{$dt->price}}"
            style="border: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color); min-height:100px;">
    </div>
@endforeach
