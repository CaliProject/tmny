<div class="page-about clear-fix">
    <!-- Header + subtitle -->
    <h1>{{ $about->title }}</h1>
    <p class="subtitle-paragraph">
        <span class="bold">{{ $about->caption }}</span>
    </p>
    <!-- /Header + subtitle -->

    <div class="page-content">
        {!! $about->content !!}
    </div>

</div>