@extends('layouts.public')

@section('css')
    <style type="text/css">
        .sku-item {
            width: 75px;
            display: inline-block;
            position: relative;
        }

        .sku-item .badge {
            font-size: 75%;
        }

        .img-radio {
            max-height: 100px;
            margin: 5px auto;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .selected-radio > img {
            opacity: .45;
        }

        .selected-radio .middle {
            opacity: 1;
        }

        .product-caption-rating > li {
            display: inline-block;
            margin-right: 5px;
            font-size: 17px;
            color: #7a7a7a;
        }
    </style>
@endsection

@section('editable_content')
    @php \Actions::do_action('pre_content',$product, null) @endphp

    @include('partials.page_header',['content'=>'<h1 class="page-title">'.$product->name.'</h1>'])

    <div class="row">
        <div class="col-md-5">
            @if(!($medias = $product->getMedia('marketplace-product-gallery'))->isEmpty())
                @php
                    $featuredImage = $medias->filter(function($media){
                        return $media->getCustomProperty('featured', false);
                    })->first();
                @endphp
                <div class="product-page-product-wrap jqzoom-stage">
                    @php
                        if(!isset($featuredImage) || !$featuredImage){$featuredImage = $medias->first();}
                    @endphp
                    @isset($featuredImage)
                        <div class="clearfix">
                            <a href="{{ $featuredImage->getUrl() }}" id="jqzoom" data-rel="gal-1">
                                <img src="{{ $featuredImage->getUrl() }}" alt="Product"
                                     title="Image"/>
                            </a>
                        </div>
                    @endisset
                    <ul class="jqzoom-list">
                        @foreach($medias as $media)
                            <li>
                                <a class="{{ $media->getCustomProperty('featured', false)?'zoomThumbActive':'' }}"
                                   href="javascript:void(0)"
                                   data-rel="{gallery:'gal-1', smallimage: '{{ $media->getUrl() }}', largeimage: '{{ $media->getUrl() }}'}">
                                    <img src="{{ $media->getUrl() }}" alt="Product"
                                         style="max-height: 70px;width: auto;max-width:70px"></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="text-center text-muted">
                    <small>@lang('corals-marketplace-box::labels.template.product_single.image_unavailable')</small>
                </div>
            @endif
        </div>
        <div class="col-md-7">
            <div class="row" data-gutter="10">
                <div class="col-md-8">
                    <div class="box">
                        @if(\Settings::get('marketplace_rating_enable',true) == 'true')
                            @include('partials.components.rating',[
                            'rating'=> $product->averageRating(1)[0],
                            'rating_count'=> $product->countRating()])
                        @endif

                        <p class="product-page-desc">
                            {{ $product->caption }}
                        </p>

                        <table
                                class="table table-striped product-page-features-table">
                            <tbody>
                            <tr>
                                <th>@lang('corals-marketplace-box::labels.template.product_single.category')</th>
                            </tr>
                            @foreach($product->activeCategories as $category)
                                <tr>
                                    <td>
                                        <a class=""
                                           href="{{ url('shop?category='.$category->slug) }}"><b>{{ $category->name }}</b></a>
                                    </td>
                                </tr>
                            @endforeach
                            @if($product->activeTags->count())
                                <tr>
                                    <th>@lang('corals-marketplace-box::labels.template.product_single.tag')</th>
                                </tr>
                                @foreach($product->activeTags as $tag)
                                    <tr>
                                        <td>
                                            <a class="" href="{{ url('shop?tag='.$tag->slug) }}"><b>{{ $tag->name }}</b></a>&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        @includeWhen($product->price_per_quantity, "templates.partials.price_per_quantity_description",['pricePerQuantity'=>$product->price_per_quantity])
                        @includeWhen($product->offers, "templates.partials.offers_list",['offers'=>$product->offers])

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-highlight">
                        @if($product->discount)
                            <p class="product-page-price-list">{{ \Payments::currency($product->regular_price) }}</p>
                        @endif
                        <p class="product-page-price" id="sku-price">
                            {!! $product->price !!}
                        </p>
                        <p class="text-muted text-sm text-uppercase">
                            <a class="" href="{{ $product->store->getUrl() }}"><b>{{ $product->store->name }}</b></a>
                        </p>

                        {!! CoralsForm::openForm(null,['url'=>'cart/'.$product->hashed_id.'/add-to-cart','method'=>'POST','class'=> 'ajax-form','id'=>'sku-form','data-page_action'=>"updateCart"]) !!}
                        @if(!$product->isSimple)
                            @switch($productSKUsDisplayMethod = $product->getProperty('show_skus_as'))
                                @case('radio_skus')
                                @include("templates.partials.".$productSKUsDisplayMethod)
                                @break
                                @case('select_skus')
                                @include("templates.partials.".$productSKUsDisplayMethod)
                                @break
                                @case('options_skus')
                                {!! $product->renderProductOptions('variation_options',null,['as_filter'=>true])  !!}
                                <input type="hidden" name="sku_hash" value="" id="sku_hash_id"/>
                                @break
                                @default
                                @include("templates.partials.radio_skus")
                            @endswitch
                        @else
                            <input type="hidden" name="sku_hash" value="{{ $product->activeSKU(true)->hashed_id }}"/>
                        @endif
                        {!! CoralsForm::number('quantity','corals-marketplace-box::attributes.template.quantity', false, 1, ['min' => 1,'class'=>'form-control form-control-sm']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div id="offers-check-result"></div>
                            </div>
                        </div>
                        @if($product->external_url)
                            <a href="{{ $product->external_url }}" target="_blank"
                               class="btn  btn-success btn-block"
                               title="@lang('corals-marketplace-box::labels.template.product_single.buy_product')">
                                <i class="fa fa-fw fa-cart-plus"
                                   aria-hidden="true"></i> @lang('corals-marketplace-box::labels.template.product_single.buy_product')
                            </a>
                        @elseif($product->isSimple && $product->activeSKU(true)->stock_status != "in_stock")
                            <a href="#" class="btn btn-sm btn-block btn-outline-danger"
                               title="Out Of Stock">
                                @lang('corals-marketplace-box::labels.partial.out_stock')
                            </a>
                        @else
                            {!! CoralsForm::button('corals-marketplace-box::labels.partial.add_to_cart',
                            ['class'=>'add-to-cart btn btn-block btn-primary'], 'submit') !!}
                        @endif

                        {{ CoralsForm::closeForm() }}

                        @if(\Settings::get('marketplace_wishlist_enable', 'true') == 'true')
                            @include('partials.components.wishlist',['wishlist'=> $product->inWishList(),'wishlistClass'=>'btn-block mt-5'])
                        @endif
                        <div class="product-page-side-section">
                            @include('partials.components.social_share',['url'=> URL::current() , 'title'=>$product->name ])
                        </div>
                        <div class="product-page-side-section">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gap"></div>
    <div class="tabbable product-tabs">
        <ul class="nav nav-tabs" id="myTab">
            @if($product->description)
                <li class="active">
                    <a href="#tab-1" data-toggle="tab">
                        @lang('corals-marketplace-box::labels.template.product_single.description')
                    </a>
                </li>
            @endif
            @if($product->present('options'))
                <li>
                    <a data-toggle="tab" href="#product-specs">
                        @lang('corals-marketplace-box::labels.template.product_single.product_options')
                    </a>
                </li>
            @endif
            @if(\Settings::get('marketplace_rating_enable',true) == 'true')
                <li class="{{ $product->description?'':'active' }}">
                    <a href="#tab-3" data-toggle="tab">
                        @lang('corals-marketplace-box::labels.template.product_single.reviews',['count'=>$product->ratings->count()])
                    </a>
                </li>
            @endif
        </ul>
        <div class="tab-content">
            @if($product->description)
                <div class="tab-pane fade in active" id="tab-1">
                    {!! $product->description !!}
                </div>
            @endif
            @if($product->present('options'))
                <div id="product-specs" class="tab-pane fade">
                    <table class="table table-striped">
                        @foreach($product->present('options') as $optionLabel => $optionsValue)
                            <tr>
                                <td>{{ $optionLabel }}</td>
                                <td>{!! $optionsValue !!}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
            @if(\Settings::get('marketplace_rating_enable',true) == 'true')
                <div class="tab-pane fade {{ $product->description?'':'in active' }}" id="tab-3">
                    @include('partials.tabs.reviews',['reviews'=>$product->ratings])
                </div>
            @endif
        </div>
    </div>
    <div class="gap"></div>
    @include('partials.category_related_products', ['categories'=>$product->activeCategories->pluck('id')->toArray(),'exclude'=> [$product->id]])
@endsection

