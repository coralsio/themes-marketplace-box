@extends('layouts.public')

@section('editable_content')
    @php \Actions::do_action('pre_content',$item, $home??null) @endphp

    {!! $item->rendered !!}

    @include('partials.category_list')
    <div class="gap"></div>
    @include('partials.featured_categories')
    <div class="gap"></div>
    @include('partials.featured_products')
    <div class="gap"></div>
    @include('partials.featured_stores')
    <div class="gap"></div>
    @include('partials.three_column_lists')
    <div class="gap"></div>
    @include('partials.featured_brands')
    <div class="gap"></div>
    <div class="row">
        {!!   \Shortcode::compile( 'block','home-block' ) ; !!}
    </div>
    <div class="gap"></div>
    <div class="row">
        <div class="col-md-6">
            @include('partials.recently_viewed_products')
        </div>
        <div class="col-md-6">
            @include('partials.products_based_only_viewed_categories')
        </div>
    </div>
    <div class="gap"></div>
    @include('partials.get_latest_reviews')
    <div class="gap"></div>
    <div class="text-center">
        @php \Actions::do_action('pre_display_footer') @endphp
    </div>
    @include('partials.news')
@stop

