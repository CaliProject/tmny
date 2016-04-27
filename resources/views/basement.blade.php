<div class="page-basement clear-fix">

    <!-- Header + subtitle -->
    <h1>{{ $basement->title }}</h1>
    <p class="subtitle-paragraph">
        <span class="bold">{{ $basement->caption }}</span>
    </p>
    <!-- /Header + subtitle -->

    <div class="basement-content">
        {!! $basement->content !!}
    </div>

</div>