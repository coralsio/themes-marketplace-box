@if ($paginator->hasPages())
    <nav>
        <ul class="pagination category-pagination pull-right">
            @if (!$paginator->onFirstPage())
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <i class="fa fa-angle-left"></i>&nbsp;
                        @lang('corals-marketplace-box::labels.partial.previous')
                    </a>
                </li>
            @endif
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>{{ $element }}</li>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a href="#">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        @lang('corals-marketplace-box::labels.partial.next')&nbsp;<i class="fa fa-angle-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
