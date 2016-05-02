<div class="page-portfolio clear-fix">

    <!-- Header + subtitle -->
    <h1>{{ $portfolio->title }}</h1>
    <p class="subtitle-paragraph">
        <span class="bold">{{ $portfolio->caption }}</span>
    </p>
    <!-- /Header + subtitle -->

    <!-- List -->
    <ul class="image-list">

        @foreach($portfolio->products as $i => $product)
                <!-- List element -->
        <li class="{{ $i % 2 === 0 ? 'left' : 'right' }}">
            <a href="{{ $product->image }}" class="fancybox-image portfolio-image" rel="gallery-1" style="background: url('{!! $product->image !!}');">
                <div class="qr">
                    <img src="{{ $product->qrcode }}" alt="">
                </div>
            </a>
            <div class="image-list-caption">
                <a href="{{ $product->link }}" target="_blank" style="height: auto;">
                    <div class="image-list-caption-title">{{ $product->name }}</div>
                    <div class="image-list-caption-subtitle">{{ str_limit($product->caption, 20) }}</div>
                </a>
            </div>
            <div class="fancybox-subtitle">
                {{ $product->caption }}
            </div>
        </li>
        <!-- /List element -->
        @endforeach

    </ul>
    <!-- /List -->
</div>