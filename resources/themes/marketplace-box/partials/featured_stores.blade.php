@php $stores = \Store::getFeaturedStores(); @endphp

@if(!$stores->isEmpty())
    <h3 class="widget-title">{{  trans('corals-marketplace-box::labels.partial.featured_stores') }}</h3>
    @php $j=0; @endphp
    @foreach($stores as $store)
        @if($j == 0)
            <div class="row" data-gutter="15">
                @endif
                <div class="col-md-3">
                    <a class="banner-category" href="{{ $store->getUrl() }}">
                        <img style="max-height: 150px;width: auto;max-width:100%;margin-bottom: 10px;"
                             src="{{$store->thumbnail }}"
                             alt="store"
                             title="store"/>
                        <h5 class="banner-category-title">{{$store->name}}</h5>
                        <p class="banner-category-desc">
                            {!! $store->short_description !!}
                        </p>
                        <span class="btn btn-primary">@lang('corals-marketplace-box::labels.partial.shop_now')</span>
                    </a>
                </div>
                @if (++$j == 4)
            </div>
            @php $j = 0; @endphp
            @endif
            @endforeach

            @if($j>0)
            </div>
            @php $j = 0; @endphp
        @endif
        @endif

