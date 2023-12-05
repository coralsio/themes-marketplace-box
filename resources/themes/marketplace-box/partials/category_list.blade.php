@php $products = \Shop::getFeaturedProducts(); @endphp

<div class="gap gap-small"></div>
<div class="row row-sm-gap" data-gutter="10">
    <div class="col-md-2">
        <div class="clearfix">
            <ul class="dropdown-menu dropdown-menu-category dropdown-menu-category-hold dropdown-menu-category-sm">
                @foreach(\Shop::getActiveCategories() as $category)
                    <li>
                        <a class="{{ $category->children->isNotEmpty()?'':'no-children' }}"
                           href="{{ url('shop?category='.$category->slug) }}">
                            {{ $category->name }}
                        </a>
                        @if($category->children->isNotEmpty())
                            <div class="dropdown-menu-category-section">
                                <div class="dropdown-menu-category-section-inner">
                                    <div class="dropdown-menu-category-section-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="dropdown-menu-category-title">
                                                    {{ $category->name }}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @foreach($category->children->chunk(2) as $chunk)
                                                <div class="col-md-6">
                                                    <ul class="dropdown-menu-category-list">
                                                        @foreach($chunk as $subCategory)
                                                            <li>
                                                                <a href="{{ url('shop?category='.$subCategory->slug) }}">{{ $subCategory->name }}</a>
                                                                @if($subCategory->description)
                                                                    <p>
                                                                        {{ $subCategory->description }}
                                                                    </p>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @if($category->thumbnail)
                                    <img class="dropdown-menu-category-section-theme-img"
                                         src="{{ $category->thumbnail }}"
                                         alt="thumb" style="right: -10px;max-height: 200px;"/>
                                @endif
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        <div class="owl-carousel owl-loaded owl-nav-dots-inner owl-carousel-curved"
             data-options='{"items":1,"loop":true}'>
            @foreach($products as $product)
                <div class="owl-item">
                    <div class="slider-item" style="background-image:url('{{ $product->image }}'); height:490px;">
                        <div class="slider-item-inner slider-item-inner-container">
                            <div class="slider-item-caption-right slider-item-caption-white slider-item-caption-sm">
                                <a href="{{ url('shop/'.$product->slug) }}">
                                    <h4 class="slider-item-caption-title">
                                        {{ $product->name }}
                                    </h4>
                                </a>
                                <p class="slider-item-caption-desc">{{ $product->caption }}</p>
                                @if(!$product->isSimple || $product->attributes()->count())
                                    @if($product->external_url)
                                        <a href="{{ $product->external_url }}" target="_blank"
                                           class="btn btn-lg btn-ghost btn-white"
                                           title="Buy Product">@lang('corals-marketplace-box::labels.partial.buy_product')
                                        </a>
                                    @else
                                        <a href="{{ url('shop/'.$product->slug) }}"
                                           class="btn btn-lg btn-ghost btn-white">
                                            @lang('corals-marketplace-box::labels.partial.add_to_cart')
                                        </a>
                                    @endif
                                @else
                                    @php $sku = $product->activeSKU(true); @endphp
                                    @if($sku->stock_status == "in_stock")
                                        @if($product->external_url)
                                            <a href="{{ $product->external_url }}" target="_blank"
                                               class="btn btn-lg btn-ghost btn-white"
                                               title="Buy Product">@lang('corals-marketplace-box::labels.partial.buy_product')
                                            </a>
                                        @else
                                            <a href="{{ url('cart/'.$product->hashed_id.'/add-to-cart/'.$sku->hashed_id) }}"
                                               data-action="post" data-page_action="updateCart"
                                               class="btn btn-lg btn-ghost btn-white">
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
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
