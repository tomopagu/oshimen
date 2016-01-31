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
                <h2>register</h1>
                <form role="form" method="POST" action="{{ url('/register') }}">
                    {!! csrf_field() !!}

                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} row">
                        <label for="username" class="col-sm-3 form-control-label">username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

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

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} row">
                        <label for="password_confirmation" class="col-sm-3 form-control-label">confirm password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-btn fa-user"></i> Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
