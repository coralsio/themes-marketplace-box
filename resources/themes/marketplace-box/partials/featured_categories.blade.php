@php $categories = \Shop::getFeaturedCategories(); @endphp

@if(!$categories->isEmpty())
    <div class="text-center">
        @php \Actions::do_action('pre_display_marketplace_featured_categories') @endphp
    </div>
    <div class="gap"></div>
    <h3 class="widget-title">@lang('corals-marketplace-box::labels.partial.featured_categories')</h3>

    @foreach($categories->chunk(6) as $chunk)
        <div class="row" data-gutter="15">
            @foreach($chunk as $category)
                <div class="col-md-2">
                    <a class="banner-category" href="{{ url('shop?category='.$category->slug) }}">
                        <img class="banner-category-img-full" src="{{ $category->thumbnail }}" alt="Category"
                             title="Category"/>
                        <h5 class="banner-category-title">{{ $category->name }}</h5>
                        <p class="banner-category-desc">
                            @lang('corals-marketplace-box::labels.partial.category_products',['count'=>\Shop::getCategoryAvailableProducts($category->id, true)])
                            {{--                            @lang('Marketplace::attributes.product.starts_at') {{ \Payments::currency($category->starting_from_price) }}--}}
                        </p>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
@endif
