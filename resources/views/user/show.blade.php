@extends('layouts.master')

@section('content')
    @if (Session::has('message'))
        <div class="user-alert alert alert-{{ Session::get('message-type') }}" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="display-1">{{ $user->username }}'s oshimen</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="card-columns">

                    @foreach ($myIdols as $idol)
                        <div class="card card-inverse text-xs-center">
                            <img class="card-img img-fluid" alt="{{ $idol->name }}" src="{{ $idol->imageurl }}">
                            <div class="card-img-overlay">
                                <h4 class="card-title">{{ $idol->name }}<br /><small>({{ $idol->group }})</small></h4>
                                @if (!Auth::guest() && Auth::user()->id === $user->id)
                                    <a href="{{ url('/user/remove-idol/'.$idol->id) }}" title="remove idol" class="remove-idol">remove</a>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    @if (!Auth::guest() && Auth::user()->id === $user->id)
                        <div class="card">
                            <div class="card-block">
                                <form action="{{ url('/user/add-idol') }}" method="POST">
                                    {!! csrf_field() !!}
                                    <fieldset class="form-group">
                                        <label for="idol">add idol</label>
                                        <select class="form-control" id="idol" name="idol">
                                            @foreach ($allIdols as $group)
                                                <optgroup label="{{ $group['group'] }}">
                                                    @foreach ($group['idols'] as $idol)
                                                        <option value="{{ $idol->id }}">{{ $idol->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                    <div class="row">
                                        <div class="col-xs-12 col-xl-6">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                <i class="fa fa-btn fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="col-xs-12 col-xl-6">
                                            <a href="{{ route('createIdol') }}" class="btn btn-primary btn-block a-btn"><i class="fa fa-btn fa-question"></i> not found</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
