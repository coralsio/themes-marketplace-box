@php $products = \Shop::getFeaturedProducts(); @endphp

@if(!$products->isEmpty())
    <h3 class="widget-title">{{ trans('corals-marketplace-box::labels.partial.featured_products') }}</h3>

    <div class="owl-carousel owl-loaded owl-nav-out"
         data-options='{"nav":true,"responsive":{"0":{"items":"1","nav":false},"600":{"items":"3"},"1000":{"items":"4"}}}'>
        @foreach($products as $product)
            <div class="owl-item">
                <div class="product  owl-item-slide">
                    @include('partials.product_grid_item',compact('product'))
                </div>
            </div>
        @endforeach
    </div>
@endif
