@extends('layouts.master')

<!-- Main Content -->
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

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form" role="form" method="POST" action="{{ url('/password/email') }}">
                        {!! csrf_field() !!}

                        <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>e-mail address</label>

                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </fieldset>

                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fa fa-btn fa-envelope"></i> send password reset link
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
