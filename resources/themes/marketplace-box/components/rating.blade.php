<div class="rating-stars">
    @for($i = 1 ; $i <= 5; $i++)
        <i class="icon-star {{ $rating >= $i ?  'filled' : '' }}"></i>
    @endfor
</div>
@if($rating_count)
    <p class="product-page-product-rating-sign">
        <a href="#">
            @lang('corals-marketplace-box::labels.partial.component.customer_review',['rating' => $rating ,'count' => $rating_count ])
        </a>
    </p>
@endif
