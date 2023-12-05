<div class="{{ $class??'' }}">
    <ul class="product-labels">
        @if($product->discount)
            <li>{{ $product->discount }}% Off</li>
        @endif
    </ul>
    <div class="product-img-wrap">
        <img class="product-img" src="{{ $product->image }}" alt="img" title="{{ $product->name }}"
             style="max-height: 150px;width: auto;margin-left: auto;margin-right: auto"/>
    </div>
    <a class="product-link" href="{{ url('shop/'.$product->slug) }}"></a>
    <div class="product-caption">
        @if(\Settings::get('marketplace_rating_enable',true) == 'true')
            @include('partials.components.rating',['rating'=> $product->averageRating(1)[0],'rating_count'=>null])
        @endif
        <h5 class="product-caption-title">
            {{ $product->name }}
        </h5>
        <div class="product-caption-price">
            @if($product->discount)
                <span class="product-caption-price-old">{{ \Payments::currency($product->regular_price) }}</span>
            @endif
            <span class="product-caption-price-new">{!! $product->price !!}</span>
        </div>
        <ul class="product-caption-feature-list">
            <li>
                <a class="" href="{{ $product->store->getUrl() }}"><b>{{ $product->store->name }}</b></a>
            </li>
        </ul>
    </div>
    @if(isset($showActions) && $showActions || true)
        <ul class="list-inline">
            @if(\Settings::get('marketplace_wishlist_enable', 'true') == 'true')
                <li>
                    @include('partials.components.wishlist',['wishlist'=> $product->inWishList() ])
                </li>
            @endif
            <li>
                @if(!$product->isSimple || $product->attributes()->count())
                    @if($product->external_url)
                        <a href="{{ $product->external_url }}" target="_blank" class="btn btn-primary btn-sm"
                           title="Buy Product">@lang('corals-marketplace-box::labels.partial.buy_product')
                        </a>
                    @else
                        <a href="{{ url('shop/'.$product->slug) }}" class="btn btn-primary btn-sm">
                            @lang('corals-marketplace-box::labels.partial.add_to_cart')
                        </a>
                    @endif
                @else
                    @php $sku = $product->activeSKU(true); @endphp
                    @if($sku->stock_status == "in_stock")
                        @if($product->external_url)
                            <a href="{{ $product->external_url }}" target="_blank" class="btn btn-primary btn-sm"
                               title="Buy Product">@lang('corals-marketplace-box::labels.partial.buy_product')
                            </a>
                        @else
                            <a href="{{ url('cart/'.$product->hashed_id.'/add-to-cart/'.$sku->hashed_id) }}"
                               data-action="post" data-page_action="updateCart"
                               class="btn btn-primary btn-sm">
                                @lang('corals-marketplace-box::labels.partial.add_to_cart')
                            </a>
                        @endif
                    @else
                        <a href="#" class="btn btn-sm btn-danger"
                           title="Out Of Stock">
                            @lang('corals-marketplace-box::labels.partial.out_stock')
                        </a>
                    @endif
                @endif
            </li>
        </ul>
    @endif
</div>
