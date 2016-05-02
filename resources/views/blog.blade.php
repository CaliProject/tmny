<div class="page-blog clear-fix">

    <!-- Header + subtitle -->
    <h1>{{ $blog->title }}</h1>
    <p class="subtitle-paragraph">
        <span class="bold">{{ $blog->caption }}</span>
    </p>
    <!-- /Header + subtitle -->

    <!-- List -->
    <ul class="blog-list">

        @foreach($blog->posts as $post)
                <!-- List element -->
        <li class="blog-list-post">

            <!-- Post header + date -->
            <div class="blog-list-post-header clear-fix">
                <h3>{{ $post->title }}</h3>
                <span><span class="month">{{ \Carbon\Carbon::parse($post->time)->month }}</span>{{ \Carbon\Carbon::parse($post->time)->day }}</span>
            </div>
            <!-- /Post header + date -->

            <!-- Post content -->
            <p class="blog-list-post-content clear-fix">
                {!! $post->content !!}
            </p>
            <!-- /Post content -->

        </li>
        <!-- /List element -->
        @endforeach

    </ul>
    <!-- /List -->

</div>