@extends('layouts.public')

@section('editable_content')
    <div class="row">
        <div class="col-md-6">
            <header class="page-header">
                <h1 class="page-title">@lang('corals-marketplace-box::labels.auth.reset_password')</h1>
            </header>
            <div class="box-lg">
                <div class="row" data-gutter="60">
                    <div class="col-md-12">
                        <h3 class="widget-title">@lang('corals-marketplace-box::labels.auth.forget_password')</h3>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                            <div class="p-2">
                                @php \Actions::do_action('pre_login_form') @endphp
                            </div>
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
                            <input class="btn btn-primary" type="submit"
                                   value="@lang('corals-marketplace-box::labels.auth.send_password_reset')">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br/>
@endsection
