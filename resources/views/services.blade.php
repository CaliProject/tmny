<div class="page-services clear-fix">

    <!-- Header + subtitle -->
    <h1>{{ $services->title }}</h1>
    <p class="subtitle-paragraph">
        <span class="bold">{{ $services->caption }}</span>
    </p>
    <!-- /Header + subtitle -->

    <!-- List -->
    <ul class="no-list">

        @foreach($services->provides as $provide)
        <!-- List element -->
        <li class="">
            <h3>{{ $provide->title }}</h3>
            <p>{{ $provide->body }}</p>
        </li>
        <!-- /List element -->
        @endforeach

    </ul>
    <!-- /List -->

</div>