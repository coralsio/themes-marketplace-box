@extends('layouts.public')

@section('editable_content')
    @include('partials.page_header', [
        'item'=>$blog,
        'content'=> (empty($blog->rendered)?('<h1>'.$blog->title.'</h1>'):$blog->rendered).(isset($title)?('<br/>'.$title):'')
    ])
    <div class="row row-col-border" data-gutter="60">
        <div class="{{ !in_array($blog->template, ['right', 'left'])?'col-md-12':'col-md-9' }} {{ $blog->template =='left'?'col-md-push-3':'' }}">
            @forelse($posts as $post)
                <article class="blog-post">
                    @if($post->featured_image)
                        <a href="{{ $post->slug }}">
                            <img class="full-width img-rounded" src="{{ $post->featured_image }}"
                                 alt="Post"/>
                        </a>
                    @endif
                    <h5 class="blog-post-title">
                        <a href="{{ url($post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h5>
                    <p class="blog-post-caption">
                        {{ \Str::limit(strip_tags($post->rendered ),250) }}

                        <a href='{{ url($post->slug) }}'
                           class='text-medium'>@lang('corals-marketplace-box::labels.blog.read_more')</a>
                    </p>
                    <ul class="blog-post-meta">
                        @if(count($activeTags = $post->activeTags))
                            @foreach($activeTags as $tag)
                                <li>
                                    <i class="fa fa-tag"></i>
                                    <a href="{{ url('tag/'.$tag->slug) }}">&nbsp;{{ $tag->name }}</a>
                                </li>
                            @endforeach
                        @endif
                        @foreach($post->activeCategories as $category)
                            <li>
                                <i class="fa fa-folder-open"></i>
                                <a href="{{ url('category/'.$category->slug) }}">
                                    &nbsp;{{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                        <li>{{ format_date($post->published_at) }}</li>
                        <li>by <a href="#">{{ $post->author->full_name }}</a>
                        </li>
                    </ul>
                </article>
            @empty
                <div class="alert alert-warning">
                    <h4>@lang('corals-marketplace-box::labels.blog.no_posts_found')</h4>
                </div>
            @endforelse
            <div class="gap-small"></div>
            {{ $posts->links('partials.paginator') }}
        </div>
        @if(in_array($blog->template, ['right', 'left']))
            <div class="{{ $blog->template =='right'? 'col-md-3':'col-md-pull-9 col-md-3' }}">
                @include('partials.blog_sidebar')
            </div>
        @endif
    </div>
@endsection
