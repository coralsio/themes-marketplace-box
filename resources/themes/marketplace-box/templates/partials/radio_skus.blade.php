@foreach($product->activeSKU as $sku)
    <div class="text-center sku-item">
        <img src="{{ asset($sku->image) }}"
             class="img-responsive img-radio mx-auto img-fluid">
        <div class="middle">
            <div class="text text-success"><i class="fa fa-check fa-4x"></i></div>
        </div>
        <div>
            {!! !$sku->options->isEmpty() ? $sku->presenter()['options']:'' !!}
        </div>
        @if($sku->stock_status == "in_stock")
            <button type="button"
                    class="btn btn-block btn-sm btn-default btn-secondary btn-radio m-t-5">
                <b>{!! $sku->discount?'<del class="text-muted">'.\Payments::currency($sku->regular_price).'</del>':''  !!} {!! \Payments::currency($sku->price) !!}</b>
            </button>
        @else
            <button type="button"
                    class="btn btn-block btn-sm m-t-5 btn-danger">
                <b> @lang('corals-marketplace-box::labels.partial.out_stock')</b>
            </button>
        @endif
        <input type="checkbox" id="left-item" name="sku_hash" value="{{ $sku->hashed_id }}"
               class="hidden d-none disable-icheck"/>
    </div>
@endforeach
<div class="form-group">
    <span data-name="sku_hash"></span>
</div>