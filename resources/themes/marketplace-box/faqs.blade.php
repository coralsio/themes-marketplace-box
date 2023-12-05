@extends('layouts.public')

@section('editable_content')
    @include('partials.page_header', ['item'=>$faq])
    <div class="row mb-5">
        <div class="col-md-12">
            {!! $faq->content !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(count($categories = \CMS::getCategoriesList(true, null, null, 'faq')))
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($categories as $category)
                                <li role="presentation">
                                    <a class="{{$loop->first ? 'active' : ''}}"
                                       href="#{{ $category->slug }}" data-toggle="tab" role="tab">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class=" col-lg-9 col-md-8">
                        <div class="tab-content">
                            @php $i = 1; @endphp
                            @foreach($categories as $category)
                                <div class="tab-pane fade  {{$loop->first ? 'in active' : ''}}"
                                     id="{{ $category->slug }}">
                                    <div class="panel-group" id="accordion{{ $category->id }}">
                                        @if(count($faqs = $category->faqs()->published()->get()))
                                            @foreach($faqs as $faq)
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse"
                                                               data-parent="#accordion{{ $category->id }}"
                                                               href="#collapse{{ $faq->id }}{{ $i }}">
                                                                {{ $faq->title }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapse{{ $faq->id }}{{ $i }}"
                                                         class="panel-collapse collapse {{ $loop->first ?'in':'' }}">
                                                        <div class="panel-body">
                                                            @if(count($faq->categories))
                                                                @foreach($faq->categories as $faq_category)
                                                                    <span style="margin-right: 20px; font-weight: bold;">
                                                                        <i class="fa fa-folder-open"></i> {{$faq_category->name}}
                                                                    </span>
                                                                @endforeach
                                                            @endif
                                                            <p>
                                                                {!! $faq->content !!}
                                                            </p>
                                                            @if(count($faq->tags))
                                                                <hr/>
                                                                <ul class="list-inline">
                                                                    @foreach($faq->tags as $tag)
                                                                        <li class="list-inline-item"><i
                                                                                    class="fa fa-tags"></i> <a
                                                                                    href="#">{{$tag->name}}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="alert alert-warning">
                                                <h4>@lang('corals-marketplace-box::labels.faqs.no_faqs_found')</h4>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @php $i++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning">
                    <h4>@lang('corals-marketplace-box::labels.faqs.no_faqs_found')</h4>
                </div>
            @endif
        </div>
    </div>
@endsection
