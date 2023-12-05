@if(\ShoppingCart::CountAllInstances() > 0)
    @foreach($items = \ShoppingCart::getAllInstanceItems() as $item)
        <li>
            <a class="dropdown-menu-shipping-cart-img" href="{{ url('shop', [$item->id->product->slug]) }}">
                <img src="{{ $item->id->image }}" style="width: 50px;" alt="image"
                     title="{!! $item->id->product->name !!}"/>
            </a>
            <div class="dropdown-menu-shipping-cart-inner">
                <p class="dropdown-menu-shipping-cart-price">
                    {{ $item->subtotal() }}
                </p>
                <p class="dropdown-menu-shipping-cart-item">
                    <a href="{{ url('shop', [$item->id->product->slug]) }}">
                        {!! $item->id->product->name !!} {{ $item->qty >1?"({$item->qty})":'' }}
                    </a>
                </p>
            </div>
        </li>
    @endforeach
@else
    <li>
        <b>@lang('corals-marketplace-box::labels.template.cart.have_no_item_cart')</b>
    </li>
@endif

<li>
    <p class="dropdown-menu-shipping-cart-total">
        @lang('corals-marketplace-box::labels.template.cart.subtotal') {{ ShoppingCart::subTotalAllInstances() }}</p>

    <a href="{{ url('checkout') }}"
       class="btn btn-primary btn-block">
        @lang('corals-marketplace-box::labels.template.cart.checkout')
    </a>
</li>
