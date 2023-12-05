<div class="navbar-before mobile-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p class="navbar-before-sign">
                    <a href="mailto:{{ \Settings::get('contact_form_email','support@example.com') }}">
                        <i class="fa fa-envelope-o"></i>&nbsp;
                        {{ \Settings::get('contact_form_email','support@example.com') }}
                    </a>
                </p>
            </div>
            <div class="col-md-6">
                <ul class="nav navbar-nav navbar-right navbar-right-no-mar">
                    <li>
                        <a class="hidden-md-down" href="tel:{{ \Settings::get('contact_mobile','+970599593301') }}"><i
                                    class="fa fa-mobile"></i>
                            &nbsp{{ \Settings::get('contact_mobile','+970599593301') }}
                        </a>
                    </li>
                    @foreach(\Settings::get('social_links',[]) as $key=>$link)
                        <li>
                            <a class="social-button sb-{{ $key }} shape-none sb-dark" href="{{ $link }}"
                               target="_blank"><i
                                        class="fa fa-{{ $key }}"></i></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-inverse navbar-main navbar-pad">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                    data-target="#main-nav-collapse" area_expanded="false"><span class="sr-only">Main Menu</span><span
                        class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="rel">
            <form class="navbar-form navbar-left navbar-main-search navbar-main-search-category" role="search"
                  action="{{ url('shop') }}" method="get" id="main-search">
                <select class="navbar-main-search-category-select" name="category">
                    <option value="">All Categories</option>
                    @foreach(\Shop::getActiveCategories() as $category)
                        <option value="{{ $category->slug }}" {{ \Shop::checkActiveKey($category->slug,'category')?'selected':'' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <div class="form-group">
                    <input class="form-control auto-complete" type="text" name="search" autocomplete="off"  data-url="{{ url('shop/autocomeplete') }}" placeholder="Search the Entire Store..."
                           value="{{ request()->get('search') }}"/>
                </div>
                <a class="fa fa-search navbar-main-search-submit" onclick="$('#main-search').submit();" href="#"></a>
            </form>

            <a class="navbar-theme-img" href="{{ url('/') }}">
                <img src="{{ \Settings::get('site_logo_white') }}" style="height: 50px;width: auto;"
                     alt="Image Alternative text" title="Image Title"/>
            </a>
        </div>
    </div>
</nav>
<nav class="navbar-inverse navbar-main yamm">
    <div class="container">
        <div class="collapse navbar-collapse navbar-collapse-no-pad" id="main-nav-collapse">
            <ul class="nav navbar-nav ">
                @include('partials.menu.menu_item', ['menus' => \Menus::getMenu('frontend_top','active')])
                @if(count(\Settings::get('supported_languages', [])) > 1)
                    <li class="dropdown yamm-fw has-children">
                        <a href="#">
                            {!! \Language::flag() !!} {!! \Language::getName() !!}
                            <i class="drop-caret" data-toggle="dropdown"></i>
                        </a>

                        {!! \Language::flags('dropdown-menu') !!}
                    </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-right-no-mar">
                @auth
                    <li>
                        <a class=""
                           href="{{ url('notifications') }}">
                            <i class="fa fa-bell-o"></i>
                            @if($unreadNotifications = user()->unreadNotifications()->count())
                                <sup>{{ $unreadNotifications }}</sup>
                            @endif
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ url('profile') }}">
                            <i class="fa fa-user"></i>
                            {{ user()->full_name }}
                        </a>
                        <ul class="dropdown-menu" style="width: 300px">
                            <li>
                                <a href="{{ url('dashboard') }}">@lang('corals-marketplace-box::labels.partial.dashboard')</a>
                            </li>
                            <li>
                                <a href="{{ url('marketplace/wishlist/my') }}">@lang('Marketplace::labels.widget.my_wishlist')</a>
                            </li>
                            <li>
                                <a href="{{ url('profile') }}">@lang('corals-marketplace-box::labels.partial.my_profile')</a>
                            </li>
                            <li><a href="{{ route('logout') }}" data-action="logout">
                                    @lang('corals-marketplace-box::labels.partial.logout') <i
                                            class="fa fa-sign-out fa-fw"></i></a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="#nav-login-dialog" data-effect="mfp-move-from-top" class="popup-text">
                            @lang('corals-marketplace-box::labels.partial.login')
                            /@lang('corals-marketplace-box::labels.partial.register')
                        </a>
                    </li>
                @endauth
                <li class="dropdown cart">
                    <a href="{{ url('cart') }}">
                        <i class="fa fa-shopping-cart"></i>
                        {{--                        <sup class="count" id="cart-header-count">--}}
                        {{--                            {{ \ShoppingCart::countAllInstances() }}--}}
                        {{--                        </sup>--}}
                        {{--                        <sup class="subtotal" id="cart-header-total">--}}
                        {{--                            {{ \ShoppingCart::totalAllInstances() }}--}}
                        {{--                        </sup>--}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-shipping-cart cart_summary">
                        @include('partials.cart_summary')
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-login-dialog">
    <div class="p-2">
        @php \Actions::do_action('pre_login_form') @endphp
    </div>
    <h3 class="widget-title">@lang('corals-marketplace-box::labels.auth.login')</h3>
    <p>@lang('corals-marketplace-box::labels.auth.sign_in_start_session')</p>
    <hr/>
    <form method="post" action="{{ route('login') }}" class="ajax-form" id="popup-login-form"
          data-page_action="site_reload">
        {{ csrf_field() }}
        <div class="form-group text-center">
            @if(session('confirmation_user_id'))
                <a href="{{ route('auth.resend_confirmation') }}">@lang('User::labels.confirmation.resend_email')</a>
            @endif
        </div>
        <div class="form-group">
            <label for="pop-email">@lang('User::attributes.user.email')</label>
            <input type="email" name="email" id="pop-email"
                   class="form-control" placeholder="@lang('User::attributes.user.email')"
                   value="{{ old('email') }}" autofocus/>

            @if ($errors->has('email'))
                <small class="help-block form-control-feedback">{{ $errors->first('email') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="pop-password">@lang('User::attributes.user.password')</label>
            <input type="password" name="password" class="form-control"
                   placeholder="@lang('User::attributes.user.password')" id="pop-password"/>
            @if ($errors->has('password'))
                <small class="help-block form-control-feedback">{{ $errors->first('password') }}</small>
            @endif
        </div>
        <div class="checkbox icheck">
            <label style="padding-left: 0;">
                <input name="remember" value="1"
                       type="checkbox" {{ old('remember') ? 'checked' : '' }}/>
                @lang('corals-marketplace-box::labels.auth.remember_me')
            </label>
        </div>
        <button class="btn btn-primary" type="submit">{{ trans('corals-marketplace-box::labels.auth.login') }}</button>
    </form>
    <div class="gap gap-small"></div>
    <ul class="list-inline">
        <li>
            <a href="#nav-account-dialog" class="popup-text">
                @lang('corals-marketplace-box::labels.auth.register_new_account')
            </a>
        </li>
        <li>
            <a href="#nav-pwd-dialog"
               class="popup-text">@lang('corals-marketplace-box::labels.auth.forget_password')</a>
        </li>
    </ul>
</div>
<div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-account-dialog">
    <h3 class="widget-title">@lang('corals-marketplace-box::labels.auth.no_account_register')</h3>
    <hr/>
    <form method="POST" action="{{ route('register') }}" class="ajax-form">
        {{ csrf_field() }}

        <div class="row" data-gutter="10">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pop-reg-name">@lang('User::attributes.user.name')</label>
                    <input type="text" name="name"
                           id="pop-reg-name"
                           class="form-control" placeholder="@lang('User::attributes.user.name')"
                           value="{{ old('name') }}" autofocus/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pop-reg-last_name">@lang('User::attributes.user.last_name')</label>
                    <input type="text" name="last_name" id="pop-reg-last_name"
                           class="form-control"
                           placeholder="@lang('User::attributes.user.last_name')"
                           value="{{ old('last_name') }}" autofocus/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="pop-reg-email">@lang('User::attributes.user.email')</label>
            <input type="email" name="email" id="pop-reg-email"
                   class="form-control" placeholder="@lang('User::attributes.user.email')"
                   value="{{ old('email') }}"/>
        </div>
        <div class="row" data-gutter="10">
            <div class="col-md-6">
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="pop-reg-password">@lang('User::attributes.user.password')</label>
                    <input type="password" id="pop-reg-password" name="password" class="form-control"
                           placeholder="@lang('User::attributes.user.password')"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pop-reg-p-conf">@lang('User::attributes.user.retype_password')</label>
                    <input id="pop-reg-p-conf" type="password" name="password_confirmation"
                           class="form-control"
                           placeholder="@lang('User::attributes.user.retype_password')"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox icheck">
                <label style="padding-left: 0;">
                    <input name="terms" value="1" type="checkbox"/>
                    <strong>@lang('corals-marketplace-box::labels.auth.agree')
                        <a href="#" data-toggle="modal" id="terms-anchor"
                           data-target="#terms">@lang('corals-marketplace-box::labels.auth.terms')</a>
                    </strong>
                </label>
            </div>
        </div>
        <input class="btn btn-primary" type="submit"
               value="@lang('corals-marketplace-box::labels.auth.register')">
    </form>
    <div class="gap gap-small"></div>
    <ul class="list-inline">
        <li><a href="#nav-login-dialog"
               class="popup-text">@lang('corals-marketplace-box::labels.auth.already_have_account')</a>
        </li>
    </ul>
</div>
<div class="mfp-with-anim mfp-hide mfp-dialog clearfix" id="nav-pwd-dialog">
    <h3 class="widget-title">@lang('corals-marketplace-box::labels.auth.reset_password')</h3>
    <p>@lang('corals-marketplace-box::labels.auth.forget_password')</p>
    <hr/>
    <form method="post" action="{{ route('password.email') }}" class="ajax-form" data-page_action="clearForm">
        {{ csrf_field() }}
        <div class="p-2">
            @php \Actions::do_action('pre_login_form') @endphp
        </div>
        <div class="form-group text-center">
            @if(session('confirmation_user_id'))
                <a href="{{ route('auth.resend_confirmation') }}">@lang('User::labels.confirmation.resend_email')</a>
            @endif
        </div>
        <div class="form-group">
            <label for="pop-forget-email">@lang('User::attributes.user.email')</label>
            <input type="email" name="email" id="pop-forget-email"
                   class="form-control" placeholder="@lang('User::attributes.user.email')"
                   value="{{ old('email') }}" autofocus/>

            @if ($errors->has('email'))
                <small class="help-block form-control-feedback">{{ $errors->first('email') }}</small>
            @endif
        </div>
        <input class="btn btn-primary" type="submit"
               value="@lang('corals-marketplace-box::labels.auth.send_password_reset')"/>
    </form>
</div>

@component('components.modal',['id'=>'terms','header'=>\Settings::get('site_name').' Terms and policy'])
    {!! \Settings::get('terms_and_policy') !!}
@endcomponent
