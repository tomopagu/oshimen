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
                    <h1>Idol</h1>
                    <form role="form" method="POST" action="{{ url('/idol/add') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-sm-3 form-control-label">name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" value="{{ (old('name')) }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }} row">
                            <label for="group" class="col-sm-3 form-control-label">group</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="group" value="{{ (old('group')) }}">
                                @if ($errors->has('group'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('group') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('imageurl') ? ' has-error' : '' }} row">
                            <label for="imageurl" class="col-sm-3 form-control-label">imageurl</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="imageurl" value="{{ (old('imageurl')) }}">
                                @if ($errors->has('imageurl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imageurl') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <button name="add-fave-idol" type="submit" class="btn btn-primary btn-block" value="false">
                                    <i class="fa fa-btn fa-plus"></i> add idol
                                </button>
                            </div>
                            <div class="col-sm-6">
                                <button name="add-fave-idol" type="submit" class="btn btn-primary btn-block" value="true">
                                    <i class="fa fa-btn fa-heart"></i> add + fave idol
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
