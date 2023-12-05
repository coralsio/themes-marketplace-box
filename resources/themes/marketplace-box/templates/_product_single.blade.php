@extends('layouts.public')

@section('css')
    <style type="text/css">
        .sku-item {
            width: 150px;
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

    <div class="row">
        <div class="col-md-7">
            @if(!($medias = $product->getMedia('marketplace-product-gallery'))->isEmpty())
                <div class="jqzoom-left clearfix">
                    <ul class="jqzoom-list">
                        @foreach($medias as $media)
                            <li>
                                @php
                                    if($media->getCustomProperty('featured', false)){$featuredImage = $media;}
                                @endphp
                                <a class="{{ $media->getCustomProperty('featured', false)?'zoomThumbActive':'' }}"
                                   href="javascript:void(0)"
                                   data-rel="{gallery:'gal-1', smallimage: '{{ $media->getUrl() }}', largeimage: '{{ $media->getUrl() }}'}">
                                    <img src="{{ $media->getUrl() }}" alt="Product"
                                         style="max-height: 100px;width: auto;max-width:100px"></a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="product-page-product-wrap jqzoom-stage jqzoom-stage-lg">
                        @php
                            if(!isset($featuredImage)){$medias->first();}
                        @endphp
                        <div class="clearfix">
                            @isset($featuredImage)
                                <a href="{{ $featuredImage->getUrl() }}" id="jqzoom" data-rel="gal-1">
                                    <img src="{{ $featuredImage->getUrl() }}" alt="Product"
                                         title="Image"/>
                                </a>
                            @endisset
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center text-muted">
                    <small>@lang('corals-marketplace-box::labels.template.product_single.image_unavailable')</small>
                </div>
            @endif
        </div>
        <div class="col-md-5">
            <div class="_box-highlight">
                @if(\Settings::get('marketplace_rating_enable',true) == 'true')
                    @include('partials.components.rating',[
                    'rating'=> $product->averageRating(1)[0],
                    'rating_count'=> optional($product->countRating())[0]])
                @endif

                <h1>{{ $product->name }}</h1>
                @if($product->discount)
                    <span class="product-caption-price-old">{{ $product->discount }}% Off</span>
                @endif
                <p class="product-page-price">{!! $product->price !!}</p>
                <p class="product-page-desc-lg">
                    {{ $product->caption }}
                </p>
                {!! CoralsForm::openForm(null,['url'=>'cart/'.$product->hashed_id.'/add-to-cart','method'=>'POST','class'=> 'ajax-form','data-page_action'=>"updateCart"]) !!}
                @if(!$product->isSimple)
                    @foreach($product->activeSKU as $sku)
                        <div class="text-center sku-item">
                            <img src="{{ asset($sku->image) }}"
                                 class="img-responsive img-radio mx-auto img-fluid">
                            <div class="middle">
                                <div class="text text-success"><i class="fa fa-check fa-4x"></i></div>
                            </div>
                            <div>
                                {!! !$sku->options->isEmpty() ? $sku->presenter()['options']:'' !!}
                            </div>
                            @if($sku->stock_status == "in_stock")
                                <button type="button"
                                        class="btn btn-block btn-sm btn-default btn-secondary btn-radio m-t-5">
                                    <b>{!! $sku->discount?'<del class="text-muted">'.\Payments::currency($sku->regular_price).'</del>':''  !!} {!! \Payments::currency($sku->price) !!}</b>
                                </button>
                            @else
                                <button type="button"
                                        class="btn btn-block btn-sm m-t-5 btn-danger">
                                    <b> @lang('corals-marketplace-box::labels.partial.out_stock')</b>
                                </button>
                            @endif
                            <input type="checkbox" id="left-item" name="sku_hash" value="{{ $sku->hashed_id }}"
                                   class="hidden d-none disable-icheck"/>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <span data-name="sku_hash"></span>
                    </div>
                @else
                    <input type="hidden" name="sku_hash" value="{{ $product->activeSKU(true)->hashed_id }}"/>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        {!! CoralsForm::number('quantity','corals-marketplace-box::attributes.template.quantity', false, 1, ['min' => 1,'class'=>'form-control form-control-sm']) !!}
                    </div>
                    <div class="col-md-8">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-10">
                            @if(\Settings::get('marketplace_wishlist_enable', 'true') == 'true')
                                @include('partials.components.wishlist',['wishlist'=> $product->inWishList() ])
                            @endif
                        </div>
                        @if($product->external_url)
                            <a href="{{ $product->external_url }}" target="_blank" class="btn btn-lg btn-success"
                               title="@lang('corals-marketplace-box::labels.template.product_single.buy_product')">
                                <i class="fa fa-fw fa-cart-plus"
                                   aria-hidden="true"></i> @lang('corals-marketplace-box::labels.template.product_single.buy_product')
                            </a>
                        @elseif($product->isSimple && $product->activeSKU(true)->stock_status != "in_stock")
                            <a href="#" class="btn btn-sm btn-outline-danger"
                               title="Out Of Stock">
                                @lang('corals-marketplace-box::labels.partial.out_stock')
                            </a>
                        @else
                            {!! CoralsForm::button('corals-marketplace-box::labels.partial.add_to_cart',
                            ['class'=>'add-to-cart btn btn-lg btn-primary'], 'submit') !!}
                        @endif
                    </div>
                </div>
                {{ CoralsForm::closeForm() }}
                <div class="mb-2 mt-2">
                <span class="text-medium"><i class="fa fa-folder" aria-hidden="true"></i>
                    @lang('corals-marketplace-box::labels.template.product_single.category')</span>
                    @foreach($product->activeCategories as $category)
                        <a class="" href="{{ url('shop?category='.$category->slug) }}"><b>{{ $category->name }}</b></a>
                        &nbsp;&nbsp;
                    @endforeach
                </div>
                <div class="mb-2">
                <span class="text-medium"><i
                            class="fa fa-home"></i> @lang('corals-marketplace-box::labels.template.product_single.store')</span>
                    <a class="" href="{{ $product->store->getUrl() }}"><b>{{ $product->store->name }}</b></a>
                     @if(\Settings::get('marketplace_rating_enable',true) == 'true')
                        @include('partials.components.rating',[
                        'rating'=> $product->store->averageRating(1)[0],
                        'rating_count'=> optional($product->store->countRating())[0]])
                    @endif
                </div>
                @if($product->activeTags->count())
                    <div class="padding-bottom-1x mb-2">
                    <span class="text-medium"><i class="fa fa-tags" aria-hidden="true"></i>
                        @lang('corals-marketplace-box::labels.template.product_single.tag')</span>
                        @foreach($product->activeTags as $tag)
                            <a class="" href="{{ url('shop?tag='.$tag->slug) }}"><b>{{ $tag->name }}</b></a>&nbsp;&nbsp;
                        @endforeach
                    </div>
                @endif
                @include('partials.components.social_share',['url'=> URL::current() , 'title'=>$product->name ])
            </div>
        </div>
    </div>
    <div class="gap"></div>
    <div class="tabbable product-tabs">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active">
                <a href="#tab-1" data-toggle="tab">
                    @lang('corals-marketplace-box::labels.template.product_single.description')
                </a>
            </li>
            @if(\Settings::get('marketplace_rating_enable',true) == 'true')
                <li><a href="#tab-3" data-toggle="tab">
                        @lang('corals-marketplace-box::labels.template.product_single.reviews',['count'=>$product->ratings->count()])
                    </a>
                </li>
            @endif
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab-1">
                {!! $product->description !!}
            </div>
            @if(\Settings::get('marketplace_rating_enable',true) == 'true')
                <div class="tab-pane fade" id="tab-3">
                    @include('partials.tabs.reviews',['reviews'=>$product->ratings])
                </div>
            @endif
        </div>
    </div>
    <div class="gap"></div>
    @include('partials.category_related_products', ['categories'=>$product->activeCategories->pluck('id')->toArray()])
@endsection

