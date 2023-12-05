<aside>
    <section class="blog-sidebar-section">
        <form action="{{ url('blog') }}" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="query"
                       placeholder="@lang('corals-marketplace-box::labels.partial.search')">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </section>
    <section class="blog-sidebar-section">
        <h3 class="widget-title-sm">@lang('corals-marketplace-box::labels.partial.categories')</h3>
        <ul class="list-unstyled">
            @foreach(\CMS::getCategoriesList(true, 'active') as $category)
                <li>
                    <h5>
                        <a href="{{ url('category/'.$category->slug) }}">
                            {{ $category->name }}
                        </a>
                        ({{ \CMS::getCategoryPostsCount($category) }})
                    </h5>
                </li>
            @endforeach
        </ul>
    </section>
    <section class="blog-sidebar-section">
        <h3 class="widget-title-sm">@lang('corals-marketplace-box::labels.partial.tag_cloud')</h3>
        <ul class="blog-sidebar-tags">
            @foreach(\CMS::getTagsList(true, 'active') as $tag)
                <li>
                    <a class="tag {{ Request::is('tag/'.$tag->slug)?'active':'' }}" href="{{ url('tag/'.$tag->slug) }}">
                        {{ $tag->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
</aside>
