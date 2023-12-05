@if(!isset($home) || !$home)
    @if(isset($featured_image))
        <header class="page-header page-header-banner" style="background-image:url({{ $featured_image }});">
            <div class="container">
                <div class="page-header-banner-inner">
                    <h1 class="page-title">{{ $item->title }}</h1>
                </div>
            </div>
        </header>
    @else
        <header class="page-header">
            @if(isset($content))
                {!! $content !!}
            @else
                <h1 class="page-title">{!! optional($item)->title  !!}</h1>
            @endif
        </header>
    @endif
@endif
