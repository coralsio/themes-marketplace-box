<a class="btn btn-default btn-sm btn-wishlist {{ $wishlistClass??'' }} {{ !is_null($wishlist) ? 'active' : '' }}"
   data-toggle="tooltip"
   title="@lang('Marketplace::module.wishlist.title')" data-style="zoom-in" data-color="red"
   href="{{ url('marketplace/wishlist/'.$product->hashed_id) }}"
   data-action="post" data-page_action="toggleWishListProduct"
   data-wishlist_product_hashed_id="{{$product->hashed_id}}">
    <i class="fa fa-heart"></i> @lang('corals-marketplace-box::labels.partial.to_which_list')
</a>
