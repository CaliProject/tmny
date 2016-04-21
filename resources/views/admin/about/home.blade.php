@foreach($abouts as $key => $about)
    {{ $key }}
    {{ $about->header }}
    {{ $about->content }}
@endforeach