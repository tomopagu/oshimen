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
                <div class="login-form col-xs-12 text-xs-center">
                    <h1>Settings for {{ $user->username }}</h1>
                    <form role="form" method="POST" action="{{ url('/user/settings') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }} row">
                            <label for="color" class="col-sm-3 form-control-label">color</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="color">
                                    @foreach ($colors as $color)
                                        <option {{ ($user->color === $color) ? 'selected' : '' }} value="{{ $color }}">{{ $color }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} row">
                            <label for="username" class="col-sm-3 form-control-label">username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" value="{{ (old('username')) ? old('username') : $user->username }}">
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
                                <input type="email" class="form-control" name="email" value="{{ (old('email')) ? old('email') : $user->email }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr />

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }} row">
                            <label for="new-password" class="col-sm-3 form-control-label">new password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="new-password">
                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password_confirmation') ? ' has-error' : '' }} row">
                            <label for="new-password_confirmation" class="col-sm-3 form-control-label">confirm new password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="new-password_confirmation">
                                @if ($errors->has('new-password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <p class="small text-xs-center" style="width: 100%;">Leave the new password fields blank if you don't wish to change your password.</p>
                        </div>

                        <hr />

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="fa fa-btn fa-floppy-o"></i> Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
