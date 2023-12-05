<div class="gap"></div>
<footer class="main-footer">
    <div class="container">
        <div class="row row-col-gap" data-gutter="60">
            <div class="col-md-3">
                <h4 class="widget-title-sm">{{ Settings::get('site_name') }}</h4>
                <p>
                    {{ \Settings::get('contact_form_email','support@example.com') }}
                </p>
                <ul class="main-footer-social-list">
                    @foreach(\Settings::get('social_links',[]) as $key=>$link)
                        <li>
                            <a class="fa fa-{{ $key }}" href="{{ $link }}" target="_blank">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="widget-title-sm">@lang('corals-marketplace-box::labels.partial.popular_tags')</h4>
                <ul class="main-footer-tag-list">
                    @foreach(\Shop::getRandomTags() as $tag)
                        <li><a href="#">{{ $tag->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3">
                <h4 class="widget-title-sm">
                    @lang('corals-marketplace-box::labels.partial.newsletter')
                </h4>
                {!! CoralsForm::openForm(null,['url' => url('utilities/newsletter/subscribe'),'method'=>'POST', 'class'=>'ajax-form','id'=>'subscribe']) !!}

                <div class="form-group">
                    <input class="newsletter-input form-control" name="email" id="subscribe-email"
                           placeholder="@lang('corals-marketplace-box::labels.partial.newsletter_email')"
                           spellcheck="false" type="text">
                    <input type="hidden" name="list_id">

                </div>
                <button type="submit" id="subscribe-button" class="btn btn-primary">
                    <i class="fa fa-rss"></i> @lang('corals-marketplace-box::labels.partial.newsletter_subscribe')
                </button>
                <label for="subscribe-email" class="subscribe-message"></label>
                {!! CoralsForm::closeForm() !!}
            </div>
            <div class="col-md-3">
                <a href="{{ url('/') }}">
                    <img src="{{ \Settings::get('site_logo') }}"
                         class="img-responsive"
                         alt="{{ \Settings::get('site_name', 'Corals') }}">
                </a>
            </div>
        </div>
        <ul class="main-footer-links-list">
            @foreach(Menus::getMenu('frontend_footer','active') as $menu)
                <li>
                    <a href="{{ url($menu->url) }}">
                        @if($menu->icon)
                            <i class="{{ $menu->icon }} fa-fw"></i>
                        @endif
                        {{ $menu->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</footer>
<div class="copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="copyright-text">
                    {!! \Settings::get('footer_text','') !!}
                </p>
            </div>
            <div class="col-md-6">
                <ul class="payment-icons-list">
                    <li>
                        <img src="{{ Theme::url('img/payment/visa-straight-32px.png') }}" alt="Image Alternative text"
                             title="Pay with Visa"/>
                    </li>
                    <li>
                        <img src="{{ Theme::url('img/payment/mastercard-straight-32px.png') }}"
                             alt="Image Alternative text"
                             title="Pay with Mastercard"/>
                    </li>
                    <li>
                        <img src="{{ Theme::url('img/payment/paypal-straight-32px.png') }}" alt="Image Alternative text"
                             title="Pay with Paypal"/>
                    </li>
                    <li>
                        <img src="{{ Theme::url('img/payment/visa-electron-straight-32px.png') }}"
                             alt="Image Alternative text"
                             title="Pay with Visa-electron"/>
                    </li>
                    <li>
                        <img src="{{ Theme::url('img/payment/maestro-straight-32px.png') }}"
                             alt="Image Alternative text"
                             title="Pay with Maestro"/>
                    </li>
                    <li>
                        <img src="{{ Theme::url('img/payment/discover-straight-32px.png') }}"
                             alt="Image Alternative text"
                             title="Pay with Discover"/>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
