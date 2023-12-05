<div class="col-md-3">
    <form id="filterForm">
        <aside class="category-filters">
            <div class="category-filters-section">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" value="{{request()->get('search')}}"
                           placeholder="@lang('Marketplace::labels.shop.search')">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <input type="hidden" name="sort" id="filterSort" value=""/>
            </div>
            <div class="category-filters-section">
                <h3 class="widget-title-sm">@lang('corals-marketplace-box::labels.template.shop.shop_categories')</h3>
                <ul class="cateogry-filters-list">
                    @foreach(\Shop::getActiveCategories() as $category)
                        @include('partials.category_filter_item',['category'=>$category])
                    @endforeach
                </ul>
            </div>
            @php
                $min = \Shop::getSKUMinPrice()??0;
                $max= \Shop::getSKUMaxPrice()??9999999;
            @endphp
            @if($min !== $max )
                <div class="category-filters-section">
                    <h3 class="widget-title-sm">
                        @lang('corals-marketplace-box::labels.template.shop.price_range')
                    </h3>
                    <div style="height: 35px;">
                        <input class="secondary" value="{{ request()->input('price.min') ?? $min}}"
                               id="slider_min_price" name="price[min]" type="hidden">
                        <input class="price-range-slider secondary" id="slider_max_price"
                               value="{{ request()->input('price.max') ?? $max }}"
                               name="price[max]" type="hidden">
                    </div>
                </div>
            @endif
            @if(!($brands = \Shop::getActiveBrands(request()->input('category')))->isEmpty())
                <div class="category-filters-section">
                    <h3 class="widget-title-sm">@lang('corals-marketplace-box::labels.template.shop.filter_brand')</h3>
                    @foreach($brands as $brand)
                        <div class="checkbox">
                            <label>
                                <input class="i-check"
                                       name="brand[]" value="{{ $brand->slug }}"
                                       type="checkbox" id="brand_{{ $brand->id }}"/>
                                {{ $brand->name }}
                                &nbsp;<span class="category-filters-amount">
                                    ({{ $brand->products_count }})
                                </span>
                            </label>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="category-filters-section">
                {!! \Shop::getAttributesForFilters(request()->input('category')) !!}
            </div>
            <button class="btn btn-primary btn-block btn-sm" type="submit">
                @lang('corals-marketplace-box::labels.template.shop.filter')
            </button>
            <br/>
        </aside>
    </form>
    @php \Actions::do_action('post_display_marketplace_filter') @endphp

    @isset($store)
        {!!   \Shortcode::compile( 'zone','store-sidebar' ) ; !!}
    @else
        {!!   \Shortcode::compile( 'zone','shop-sidebar' ) ; !!}
    @endisset
</div>
@push('partial_js')
    <script type="text/javascript">
        $(document).ready(function () {
            let data_min = {{$min}};
            let data_max = {{$max}};
            let priceRangeSlider = $('.price-range-slider');

            priceRangeSlider.jRange({
                from: data_min,
                to: data_max,
                step: 1,
                format: '$%s',
                width: 200,
                showLabels: true,
                showScale: false,
                isRange: true,
                theme: "theme-edragon secondary",
                onstatechange: function (data_min, data_max) {
                    var prices = data_min.split(",");
                    $("#slider_min_price").val(prices[0]);
                    $("#slider_max_price").val(prices[1]);
                }
            });

            priceRangeSlider.jRange('setValue', '{{ request()->input('price.min') ?? $min}},{{ request()->input('price.max') ?? $max}}');
        });
    </script>
@endpush
