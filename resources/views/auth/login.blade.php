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
            <div class="login-form col-xs-12 text-xs-center">
                <h2>login</h1>
                <form role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                        <label for="email" class="col-sm-3 form-control-label">email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                        <label for="password" class="col-sm-3 form-control-label">password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-9 col-md-offset-3">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-btn fa-sign-in"></i>Login
                            </button>

                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
