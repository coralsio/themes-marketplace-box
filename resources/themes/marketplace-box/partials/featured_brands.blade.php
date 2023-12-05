@php $brands = \Shop::getFeaturedBrands(); @endphp

@if(!$brands->isEmpty())
    <h3 class="widget-title">{{ trans('corals-marketplace-box::labels.partial.popular_brands') }}</h3>

    <div class="owl-carousel owl-loaded owl-nav-out"
         data-options='{"nav":true,"responsive":{"0":{"items":"1","nav":false},"600":{"items":"3"}}}'>
        @foreach($brands as $brand)
            <div class="owl-item">
                <div class="product  owl-item-slide">
                    <a href="{{ url('shop?brand[]='.$brand->slug) }}" title="{{ $brand->name }}"
                       style="width:365px;vertical-align: middle;height: 150px;line-height: 150px;display: table-cell;">
                        <img class="m-auto" src="{{ $brand->thumbnail }}"
                             style="max-height: 110px; width: auto;max-width: 300px;"
                             alt="{{ $brand->name }}">
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif
