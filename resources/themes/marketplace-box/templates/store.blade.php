@extends('layouts.public')

@section('css')
    <style>
        .product {
            margin: 10px;
        }
    </style>
@endsection

@section('editable_content')
    @include('partials.page_header',['featured_image'=>$store->cover_photo,'item'=>(object)['title'=>'']])
    <div class="row">
        @include('partials.shop_filter')
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3 text-center">
                    <img id="store-logo" src="{{ $store->thumbnail }}" alt="thumb" style="max-width: 150px;">
                    @if($store->return_policy)
                        <div class="text-center">
                            <a href="{{ request()->url().'/return-policy' }}" class="modal-load"
                               data-title="@lang('Marketplace::attributes.store.return_policy')">
                                <small>@lang('Marketplace::attributes.store.return_policy')</small>
                            </a>
                        </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <h1>
                        {{ $store->name }}
                        <a class="btn btn-primary btn-sm"
                           href="{{ url('messaging/discussions/create?user='.$store->user->hashed_id) }}">
                            <i class="fa fa-envelope-o"></i>&nbsp;
                            @lang('corals-marketplace-box::labels.template.store.contact',['store_name'=>$store->name])
                        </a>
                    </h1>
                    <p>{!! $store->short_description !!}</p>
                </div>
            </div>
            <hr/>
            <div class="text-right">
                <ul class="list-inline">
                    <li>
                        <a class="fa fa-th-large category-selections-icon {{ $layout=='grid'?'active':'' }}"
                           href="{{ request()->fullUrlWithQuery(['layout'=>'grid']) }}"></a>
                    </li>
                    <li>
                        <a class="fa fa-th-list {{ $layout=='list'?'active':'' }} category-selections-icon"
                           href="{{ request()->fullUrlWithQuery(['layout'=>'list']) }}"></a>
                    </li>
                    <li>
                        <label for="shop_sort">
                            @lang('corals-marketplace-box::labels.template.shop.sort')
                        </label>
                        <select class="category-selections-select" id="shop_sort">
                            <option disabled="disabled"
                                    selected>@lang('corals-marketplace-box::labels.template.shop.select_option')</option>
                            @foreach($sortOptions as $value => $text)
                                <option value="{{ $value }}" {{ request()->get('sort') == $value?'selected':'' }}>
                                    {{ $text }}
                                </option>
                            @endforeach
                        </select>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @php \Actions::do_action('pre_display_shop') @endphp
                    {!! \Shortcode::compile( 'zone','shop-header' ) !!}
                </div>
            </div>
            @isset($shopText)
                <div class="row">
                    <div class="col-md-6">
                        {{ $shopText }}
                        <hr/>
                    </div>
                </div>
            @endisset
            <div class="row ">
                @forelse($products->chunk($layout=='grid'?3:1) as $chunk)
                    <div class="row ">
                        @foreach($chunk as $product)
                            <div class="{{ $layout=='grid'?'col-md-4':'col-md-12' }}">
                                @include('partials.product_'.$layout.'_item', ['product'=>$product,'class'=> 'product'])
                            </div>
                        @endforeach
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4>@lang('corals-marketplace-box::labels.template.shop.sorry_no_result')</h4>
                    </div>
                @endforelse
            </div>
            <div class="clearfix"></div>
            @if ($products->count())
                <div class="row">
                    <div class="col-md-6">
                        <p class="category-pagination-sign">
                            @lang('corals-marketplace-box::labels.template.shop.show')

                            @lang('corals-marketplace-box::labels.template.shop.page',['current'=>$products->currentPage(),'total' => $products->lastPage()])
                        </p>
                    </div>
                    <div class="col-md-6">
                        {{ $products->appends(request()->except('page'))->links('partials.paginator') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            {!!   \Shortcode::compile( 'zone','store-footer' ) ; !!}
        </div>
    </div>
@stop

@section('js')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            $("#shop_sort").change(function () {
                $("#filterSort").val($(this).val());

                $("#filterForm").submit();
            })
        });
    </script>
@endsection
