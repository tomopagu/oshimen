@extends('layouts.master')

@section('content')
    <div class="vertically-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-xs-center">
                    <h1 class="display-1">oshimen</h1>
                </div>
            </div>
            <div class="row">
                <div class="login-form col-xs-12 text-xs-center text-sm-left">
                    <h2 class="text-xs-center">reset password</h1>

                    <form class="form" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {!! csrf_field() !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>E-Mail Address</label>

                            <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </fieldset>

                        <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>Password</label>

                            <input type="password" class="form-control" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </fieldset>

                        <fieldset class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label>Confirm Password</label>

                            <input type="password" class="form-control" name="password_confirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </fieldset>

                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-btn fa-refresh"></i>Reset Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
