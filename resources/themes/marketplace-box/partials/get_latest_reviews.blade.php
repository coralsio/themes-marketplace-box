@php $reviews = \Shop::getLatestReviews(); @endphp

@if($reviews->isNotEmpty())
    <h3 class="widget-title">{{ trans('corals-marketplace-box::labels.partial.latest_reviews') }}</h3>

    <div class="owl-carousel owl-loaded owl-nav-out"
         data-options='{"nav":true,"responsive":{"0":{"items":"1","nav":false},"600":{"items":"3"},"1000":{"items":"5"}}}'>
        @foreach($reviews as $review)
            @continue(!$review->reviewrateable)
            <div class="owl-item">
                <div class="product-review-thumb owl-item-slide">
                    <header class="product-review-thumb-header">
                        <img class="product-review-thumb-reviewer-img" src="{{ @$review->author->picture_thumb }}"
                             alt="picture"
                             style="max-width: 70px;height: auto;">
                        <div class="product-review-thumb-header-side">
                            @include('partials.components.rating',['rating'=> $review->rating,'rating_count'=>null ])
                            <h5 class="product-review-thumb-reviewer-name">{{ @$review->author->full_name }}</h5>
                        </div>
                    </header>
                    <p class="product-review-thumb-body">
                        {{ $review->body }}
                    </p>
                    <div class="product-review-thumb-product">
                        <img class="product-review-thumb-product-img" src="{{ $review->reviewrateable->image }}"
                             alt="Image" style="width: 50px;">
                        <h5 class="product-review-thumb-product-title">
                            <a href="{{ url('shop/'. $review->reviewrateable->slug) }}">
                                {{ $review->reviewrateable->name }}
                            </a>
                        </h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
