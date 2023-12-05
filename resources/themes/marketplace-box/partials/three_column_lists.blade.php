@if(!($topSellersProducts = \Shop::getTopSellers())->isEmpty())
    <div class="row">
        <div class="col-md-12">
            <h3 class="widget-title">@lang('corals-marketplace-box::labels.partial.top_sellers')</h3>

            <div class="owl-carousel owl-loaded owl-nav-out"
                 data-options='{"nav":true,"responsive":{"0":{"items":"1","nav":false},"600":{"items":"2"}}}'>
                @foreach($topSellersProducts as $product)
                    <div class="owl-item">
                        <div class="product  owl-item-slide">
                            @include('partials.product_grid_item',compact('product'))
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="gap"></div>
@endif
<div class="row">
    @if(!($newArrivalsProducts = \Shop::getNewArrivals())->isEmpty())
        <div class="col-md-6">
            <h3 class="widget-title">@lang('corals-marketplace-box::labels.partial.new_arrivals')</h3>
            <div class="owl-carousel owl-loaded owl-nav-out"
                 data-options='{"nav":true,"responsive":{"0":{"items":"1","nav":false},"600":{"items":"2"}}}'>
                @foreach($newArrivalsProducts as $product)
                    <div class="owl-item">
                        <div class="product  owl-item-slide">
                            @include('partials.product_grid_item',compact('product'))
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if(!($bestRatedProducts = \Shop::getBestRated())->isEmpty())
        <div class="col-md-6">
            <h3 class="widget-title">@lang('corals-marketplace-box::labels.partial.best_rated')</h3>
            <div class="owl-carousel owl-loaded owl-nav-out"
                 data-options='{"nav":true,"responsive":{"0":{"items":"1","nav":false},"600":{"items":"2"}}}'>
                @foreach($bestRatedProducts as $product)
                    <div class="owl-item">
                        <div class="product  owl-item-slide">
                            @include('partials.product_grid_item',compact('product'))
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
