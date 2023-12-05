@foreach($reviews as $review)
    <article class="product-review">
        <div class="product-review-author">
            <img class="product-review-author-img" src="{{ @$review->author->picture_thumb }}"
                 alt="picture" style="max-width: 70px;height: auto;" title="Review author">
        </div>
        <div class="product-review-content-full">
            <h5 class="product-review-title">{{ $review->title }}</h5>
            @include('partials.components.rating',['rating'=> $review->rating,'rating_count'=>null ])
            <p class="product-review-meta">{{ @$review->author->full_name }}</p>
            <p class="product-review-body">
                {{ $review->body }}
            </p>
        </div>
    </article>
@endforeach

@if(!user())
    <div class="alert alert-info">
        @lang('corals-marketplace-box::labels.partial.tabs.need_login_review')
    </div>
@else
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4>@lang('corals-marketplace-box::labels.partial.tabs.leave_review')</h4>
            {!! CoralsForm::openForm(null,['url' => url('shop/'.$product->hashed_id.'/rate'),'method'=>'POST', 'class'=>'ajax-form row','id'=>'checkoutForm','data-page_action'=>"clearForm"]) !!}
            <div class="row">
                <div class="col-md-6">
                    {!! CoralsForm::text('review_subject','corals-marketplace-box::attributes.tab.subject',true) !!}
                </div>

                <div class="col-md-6">
                    {!! CoralsForm::select('review_rating', 'corals-marketplace-box::attributes.tab.rating', trans('corals-marketplace-box::attributes.tab.rating_option'),true) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! CoralsForm::textarea('review_text','corals-marketplace-box::attributes.tab.review',true,null,['rows'=>4]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-right">
                    {!! CoralsForm::button('corals-marketplace-box::labels.partial.tabs.submit_review',['class'=>'btn btn-outline-primary'], 'submit') !!}
                </div>
            </div>
            {!! CoralsForm::closeForm() !!}
        </div>
    </div>
@endif
