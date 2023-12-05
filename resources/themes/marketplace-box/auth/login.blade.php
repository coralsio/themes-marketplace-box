@extends('layouts.public')

@section('editable_content')
    <div class="row">
        <div class="col-md-10">
            <header class="page-header">
                <h1 class="page-title">@lang('corals-marketplace-box::labels.auth.login_register')</h1>
            </header>
            <div class="box-lg">
                <div class="row" data-gutter="60">
                    <div class="col-md-6">
                        <div class="p-2">
                            @php \Actions::do_action('pre_login_form') @endphp
                        </div>
                        <h3 class="widget-title">@lang('corals-marketplace-box::labels.auth.sign_in_start_session')</h3>
                        <form method="post" action="{{ route('login') }}" id="login-form">
                            {{ csrf_field() }}
                            <div class="form-group text-center">
                                @if(session('confirmation_user_id'))
                                    <a href="{{ route('auth.resend_confirmation') }}">@lang('User::labels.confirmation.resend_email')</a>
                                @endif
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">@lang('User::attributes.user.email')</label>
                                <input type="email" name="email" id="email"
                                       class="form-control" placeholder="@lang('User::attributes.user.email')"
                                       value="{{ old('email') }}" autofocus/>

                                @if ($errors->has('email'))
                                    <small class="help-block form-control-feedback">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">@lang('User::attributes.user.password')</label>
                                <input type="password" name="password" class="form-control"
                                       placeholder="@lang('User::attributes.user.password')" id="password"/>
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

                            <button class="btn btn-primary"
                                    type="submit">{{ trans('corals-marketplace-box::labels.auth.login') }}</button>
                        </form>
                        <br><a href="{{ route('password.request') }}">@lang('corals-marketplace-box::labels.auth.forget_password')</a>
                        <hr/>
                        <div class="socials-buttons text-center">
                            @if(config('services.facebook.client_id'))
                                <a class="btn btn-social btn-facebook" href="{{ route('auth.social', 'facebook') }}">
                                    <span class="fa fa-facebook"></span>
                                </a>
                            @endif
                            @if(config('services.twitter.client_id'))
                                <a class="btn btn-social btn-twitter" href="{{ route('auth.social', 'twitter') }}">
                                    <span class="fa fa-twitter"></span>
                                </a>
                            @endif
                            @if(config('services.google.client_id'))
                                <a class="btn btn-social btn-google" href="{{ route('auth.social', 'google') }}">
                                    <span class="fa fa-google"></span>
                                </a>
                            @endif
                            @if(config('services.github.client_id'))
                                <a class="btn btn-social btn-github" href="{{ route('auth.social', 'github') }}">
                                    <span class="fa fa-github"></span>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="widget-title">@lang('corals-marketplace-box::labels.auth.no_account_register')</h3>
                        <form method="POST" action="{{ route('register') }}" class="ajax-form">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="reg-name">@lang('User::attributes.user.name')</label>
                                        <input type="text" name="name"
                                               id="reg-name"
                                               class="form-control" placeholder="@lang('User::attributes.user.name')"
                                               value="{{ old('name') }}" autofocus/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="reg-last_name">@lang('User::attributes.user.last_name')</label>
                                        <input type="text" name="last_name" id="reg-last_name"
                                               class="form-control"
                                               placeholder="@lang('User::attributes.user.last_name')"
                                               value="{{ old('last_name') }}" autofocus/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="reg-email">@lang('User::attributes.user.email')</label>
                                <input type="email" name="email" id="reg-email"
                                       class="form-control" placeholder="@lang('User::attributes.user.email')"
                                       value="{{ old('email') }}"/>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="reg-password">@lang('User::attributes.user.password')</label>
                                        <input type="password" id="reg-password" name="password" class="form-control"
                                               placeholder="@lang('User::attributes.user.password')"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="reg-p-conf">@lang('User::attributes.user.retype_password')</label>
                                        <input id="reg-p-conf" type="password" name="password_confirmation"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    @component('components.modal',['id'=>'terms','header'=>\Settings::get('site_name').' Terms and policy'])
        {!! \Settings::get('terms_and_policy') !!}
    @endcomponent
@endsection
