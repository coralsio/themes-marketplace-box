@extends('layouts.public')

@section('editable_content')
    @include('partials.page_header',['content' => '<h1><i class="fa fa-shopping-cart fa-fw"></i> Cart</h1>'])
    @php \Actions::do_action('pre_content', null, null) @endphp

    @if (count(ShoppingCart::getAllInstanceItems()) > 0)
        <div class="row">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-shopping-cart">
                        <thead>
                        <tr>
                            <th></th>
                            <th>@lang('corals-marketplace-box::labels.template.cart.product')</th>
                            <th>@lang('corals-marketplace-box::labels.template.cart.quantity')</th>
                            <th>@lang('corals-marketplace-box::labels.template.cart.price')</th>
                            <th>
                                <a class="btn btn-sm btn-danger" href="{{ url('cart/empty') }}"
                                   title="Delete" data-action="post" data-page_action="site_reload">
                                    @lang('corals-marketplace-box::labels.template.cart.clear_cart')
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $categories =[];
                            $excludedProductsIds=  [];
                        @endphp
                        @foreach (\ShoppingCart::getAllInstanceItems() as $item)
                            @php
                                $categories = array_unique(array_merge($categories,$item->id->product->activeCategories->pluck('id')->toArray()));
                                $excludedProductsIds = array_unique(array_merge($excludedProductsIds,[$item->id->product->id]));
                            @endphp
                            <tr id="item-{{$item->getHash()}}">
                                <td class="table-shopping-cart-img">
                                    <a href="{{ url('shop', [$item->id->product->slug]) }}">
                                        <img src="{{ $item->id->image }}" alt="SKU Image"
                                             title="{{ $item->id->product->name }}">
                                    </a>
                                </td>
                                <td class="table-shopping-cart-title">
                                    <a href="{{ url('shop', [$item->id->product->slug]) }}">
                                        {!! $item->id->product->name !!} [{{$item->id->code }}]
                                    </a>
                                    {!!  $item->id->presenter()['options']  !!}
                                    {!! formatArrayAsLabels(\OrderManager::mapSelectedAttributes($item->product_options), 'success',null,true)    !!}
                                </td>
                                <td>
                                    @if(!$item->id->isAvailable($item->qty))
                                        @lang('Marketplace::labels.shop.out_stock')
                                    @else
                                        @if($item->id->allowed_quantity != 1)
                                            <form action="{{ url('cart/quantity', [$item->getHash()]) }}" method="POST"
                                                  class="ajax-form form-inline" data-page_action="updateCart">
                                                {{ csrf_field() }}
                                                <a href="{{ url('cart/quantity', [$item->getHash()]) }}"
                                                   class="btn btn-sm btn-warning item-button"
                                                   title="Remove One" data-action="post" data-style="zoom-in"
                                                   data-request_data='@json(["action"=>"decreaseQuantity"])'
                                                   data-page_action="updateCart">
                                                    <i class="fa fa-fw fa-minus"></i>
                                                </a>
                                                <input step="1" min="1"
                                                       class="form-control form-control-sm cart-quantity"
                                                       style="width:60px;display: inline;text-align:center"
                                                       type="number"
                                                       name="quantity"
                                                       data-id="{{ $item->rowId }}"
                                                       {!! $item->id->allowed_quantity>0?('max="'.$item->id->allowed_quantity.'"'):'' !!} value="{{ $item->qty }}"/>
                                                <a href="{{ url('cart/quantity', [$item->getHash()]) }}"
                                                   class="btn btn-sm btn-success item-button" data-style="zoom-in"
                                                   title="Add One" data-action="post" data-page_action="updateCart"
                                                   data-request_data='@json(["action"=>"increaseQuantity"])'>
                                                    <i class="fa fa-fw fa-plus"></i>
                                                </a>
                                            </form>
                                        @else
                                            <input style="width:40px;text-align: center;"
                                                   value="1"
                                                   disabled/>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    {{ $item->subtotal() }}
                                </td>
                                <td class="text-center">
                                    <a class="remove-from-cart item-button"
                                       href="{{ url('cart/quantity', [$item->getHash()]) }}"
                                       data-action="post" data-style="zoom-in"
                                       data-request_data='@json(["action"=>"removeItem"])'
                                       data-page_action="updateCart"
                                       data-toggle="tooltip"
                                       title="Remove item">
                                        <i class="fa fa-close"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="gap gap-small"></div>
            </div>
            <div class="col-md-2">
                <ul class="shopping-cart-total-list">
                    <li>
                        <span>
                            @lang('corals-marketplace-box::labels.template.cart.subtotal')
                        </span>
                        <span id="total">
                            {{ ShoppingCart::subTotalAllInstances() }}
                        </span>
                        @if(Settings::get('marketplace_tax_tax_included_in_price'))
                            <small style="font-size: 9px">@lang('Marketplace::attributes.product.tax_included') </small>
                        @endif
                    </li>
                </ul>
                <a class="btn btn-success btn-block" href="{{ url('shop') }}">
                    @lang('corals-marketplace-box::labels.template.cart.back_shopping')
                </a>
                <a class="btn btn-primary btn-block" href="{{ url('checkout') }}">
                    @lang('corals-marketplace-box::labels.template.cart.checkout')
                </a>
                <div class="gap gap-small"></div>
            </div>
        </div>
    @else
        <div class="text-center">
            <i class="fa fa-cart-arrow-down empty-cart-icon"></i>
            <p class="lead">@lang('corals-marketplace-box::labels.template.cart.have_no_item')</p>
            <a class="btn btn-primary btn-lg" href="{{ url('shop') }}">
                @lang('corals-marketplace-box::labels.template.cart.continue_shopping')
                <i class="fa fa-long-arrow-right"></i>
            </a>
        </div>
        <div class="gap"></div>
    @endif

    @if(empty($categories))
        @include('partials.featured_products',['title'=>trans('corals-marketplace-box::labels.template.cart.title')])
    @else
        @include('partials.category_related_products', ['categories'=>$categories,'exclude'=> $excludedProductsIds])
    @endif
@stop
