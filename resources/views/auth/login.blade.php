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
                <h2 class="text-xs-center">login</h1>
                <form role="form" method="POST" action="{{ url('/login') }}">
                    {!! csrf_field() !!}
                    <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </fieldset>

                    <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">password</label>
                        <input type="password" class="form-control" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </fieldset>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> remember me
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-btn fa-sign-in"></i> login
                    </button>

                    <a class="btn btn-link btn-block" href="{{ url('/password/reset') }}">forgot your password?</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
