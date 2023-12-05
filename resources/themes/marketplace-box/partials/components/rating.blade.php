<ul class="product-caption-rating">
    @for($i = 1 ; $i <= 5; $i++)
        <li class="rated">
            <i class="fa fa-star{{ $rating >= $i ?  '' : '-o' }}"></i>
        </li>
    @endfor
</ul>
@if($rating_count)
    <p class="product-page-product-rating-sign">
        &nbsp;@lang('corals-marketplace-box::labels.partial.component.customer_review',['rating' => $rating ,'count' => $rating_count])
    </p>
@endif
