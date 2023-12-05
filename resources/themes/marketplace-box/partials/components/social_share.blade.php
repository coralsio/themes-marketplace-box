<div>
    <h5 class="product-page-side-title">@lang('corals-marketplace-box::labels.partial.share')</h5>
    <ul class="product-page-share-item">
        <li>
            <a href="https://www.facebook.com/sharer.php?u={{ $url }}"
               onClick="openInNewWindow(this.href,this.title);"
               data-toggle="tooltip" data-placement="top" title="Facebook">
                <i class="fa fa-facebook"></i>
            </a>
        </li>
        <li>
            <a href="https://twitter.com/share?url={{ $url }}&text={{ $title }}" data-toggle="tooltip"
               onClick="openInNewWindow(this.href,this.title);"
               data-placement="top" title="Twitter">
                <i class="fa fa-twitter"></i>
            </a>
        </li>
        <li>
            <a href="https://pinterest.com/pin/create/button/?url={{ $url }}" data-toggle="tooltip"
               onClick="openInNewWindow(this.href,this.title);"
               data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i>
            </a>
        </li>
    </ul>
</div>
