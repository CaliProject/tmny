<div class="page-about clear-fix">
    <!-- Header + subtitle -->
    <h1>{{ $about->title }}</h1>
    <p class="subtitle-paragraph">
        <span class="bold">{{ $about->caption }}</span>
    </p>
    <!-- /Header + subtitle -->

    <!-- List -->
    <ul class="no-list list-1">

        @foreach($about->sections as $index => $section)
        <!-- List element -->
        <li class="{{ $index % 2 === 0 ? 'left' : 'right' }}">
            <h3>{{ $section->title }}</h3>
            <p>{{ $section->body }}</p>
        </li>
        <!-- /List element -->
        @endforeach

    </ul>
    <!-- /List -->

</div>