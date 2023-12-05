@php $products = \Shop::getRecentlyViewedProducts(); @endphp

@if($products->isNotEmpty())
    <h3 class="widget-title">{{ trans('corals-marketplace-box::labels.partial.recently_viewed_products') }}</h3>

    <div class="owl-carousel owl-loaded owl-nav-out"
         data-options='{"nav":true,"responsive":{"0":{"items":"1","nav":false},"1000":{"items":"2"}}}'>
        @foreach($products as $product)
            <div class="owl-item">
                <div class="product  owl-item-slide">
                    @include('partials.product_grid_item',compact('product'))
                </div>
            </div>
        @endforeach
    </div>
@endif
