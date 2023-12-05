@php $products = \Shop::getRandomProductsOfCategories($categories,$exclude??[]); @endphp

<h3 class="widget-title">@lang('corals-marketplace-box::labels.partial.you_might_like')</h3>
@foreach($products->chunk(4) as $chunk)
    <div class="row">
        @foreach($chunk as $product)
            <div class="col-md-3">
                <div class="product product-sm-left" style="height: 150px;margin-bottom: 10px;">
                    <ul class="product-labels">
                        @if($product->discount)
                            <li>{{ $product->discount }}% Off</li>
                        @endif
                    </ul>
                    <div class="product-img-wrap">
                        <img class="product-img" src="{{ $product->image }}" alt="Image">
                    </div>
                    <a class="product-link" href="{{ url('shop/'.$product->slug) }}"></a>
                    <div class="product-caption">
                        @if(\Settings::get('marketplace_rating_enable',true) == 'true')
                            @include('partials.components.rating',['rating'=> $product->averageRating(1)[0],'rating_count'=>null])
                        @endif
                        <h5 class="product-caption-title">{{ $product->name }}</h5>
                        <div class="product-caption-price">
                            @if($product->discount)
                                <span class="product-caption-price-old">{{ \Payments::currency($product->regular_price) }}</span>
                            @endif
                            <span class="product-caption-price-new">{!! $product->price !!}</span>
                        </div>
                        <ul class="product-caption-feature-list">
                            <li>
                                <a class=""
                                   href="{{ $product->store->getUrl() }}"><b>{{ $product->store->name }}</b></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
