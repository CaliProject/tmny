<div class="page-portfolio clear-fix">

    <!-- Header + subtitle -->
    <h1>{{ $portfolio->title }}</h1>
    <p class="subtitle-paragraph">
        <span class="bold">{{ $portfolio->caption }}</span>
    </p>
    <!-- /Header + subtitle -->

    <div class="page-content">
        {!! $portfolio->content !!}
    </div>
</div>