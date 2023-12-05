@extends('layouts.public')

@section('editable_content')
    @include('partials.page_header')

    <div>
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                {!! $item->rendered !!}
            </div>
            <div class="col-md-pull-9 col-md-3">
                @include('partials.sidebar')
            </div>
        </div>
    </div>
@stop
