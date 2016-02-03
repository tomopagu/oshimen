@extends('layouts.master')

@section('content')
    @if (Session::has('message'))
        <div class="user-alert alert alert-{{ Session::get('message-type') }}" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="vertically-center">
        <div class="container">
            <div class="row">
                <div class="login-form col-xs-12 text-xs-center text-sm-left">
                    <h1>Settings for {{ $user->username }}</h1>
                    <form role="form" class="form" method="POST" action="{{ url('/user/settings') }}">
                        {!! csrf_field() !!}

                        <fieldset class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color">color</label>
                            <select class="form-control" name="color">
                                @foreach ($colors as $color)
                                    <option {{ ($user->color === $color) ? 'selected' : '' }} value="{{ $color }}">{{ $color }}</option>
                                @endforeach
                            </select>
                        </fieldset>

                        <fieldset class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username">username</label>
                            <input type="text" class="form-control" name="username" value="{{ (old('username')) ? old('username') : $user->username }}">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </fieldset>

                        <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">email</label>
                            <input type="email" class="form-control" name="email" value="{{ (old('email')) ? old('email') : $user->email }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </fieldset>

                        <hr />

                        <fieldset class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password">new password</label>
                            <input type="password" class="form-control" name="new-password">
                            @if ($errors->has('new-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new-password') }}</strong>
                                </span>
                            @endif
                        </fieldset>

                        <fieldset class="form-group{{ $errors->has('new-password_confirmation') ? ' has-error' : '' }}">
                            <label for="new-password_confirmation">confirm new password</label>
                            <input type="password" class="form-control" name="new-password_confirmation">
                            @if ($errors->has('new-password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new-password_confirmation') }}</strong>
                                </span>
                            @endif
                            <p class="small text-xs-center" style="width: 100%;">Leave the new password fields blank if you don't wish to change your password.</p>
                        </fieldset>

                        <hr />

                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-btn fa-floppy-o"></i> Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
