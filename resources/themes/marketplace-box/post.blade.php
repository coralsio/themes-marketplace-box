@extends('layouts.public')

@section('editable_content')
    @include('partials.page_header',['title'=>$item->title,'featured_image'=>null])
    <div class="row row-col-border" data-gutter="60">
        <div class="{{ !in_array($blog->template, ['right', 'left'])?'col-md-12':'col-md-9' }} {{ $blog->template =='left'?'col-md-push-3':'' }}">
            <article class="blog-post">
                @if($featured_image)
                    <a href="{{ $item->post->slug }}">
                        <img class="full-width img-rounded" src="{{$featured_image}}" alt="post">
                    </a>
                @endif
                <ul class="blog-post-meta">
                    @if(count($activeTags = $item->post->activeTags))
                        @foreach($activeTags as $tag)
                            <li>
                                <i class="fa fa-tag"></i>
                                <a href="{{ url('tag/'.$tag->slug) }}">&nbsp;{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    @endif
                    @foreach($item->post->activeCategories as $category)
                        <li>
                            <i class="fa fa-folder-open"></i>
                            <a href="{{ url('category/'.$category->slug) }}">
                                &nbsp;{{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                    <li>{{ format_date($item->post->published_at) }}</li>
                    <li>by <a href="#">{{ $item->post->author->full_name }}</a>
                    </li>
                </ul>
                <div class="blog-post-body">
                    {!! $item->rendered !!}
                </div>
            </article>
            <hr/>
            @if(\Settings::get('cms_comments_enabled'))
                <div class="row">
                    <div class="col-md-12">
                        @include('CMS::partials.comments',['comments'=>$item->publishedComments])
                    </div>
                </div>
            @endif
        </div>
        @if(in_array($blog->template, ['right', 'left']))
            <div class="{{ $blog->template =='right'? 'col-md-3':'col-md-pull-9 col-md-3' }}">
                @include('partials.blog_sidebar')
            </div>
        @endif
    </div>
@endsection
