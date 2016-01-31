@extends('layouts.master')

@section('content')
    <div class="home-bg">
        <video autoplay loop muted poster="{{ asset('YCL9p7Z1Zag.jpg') }}" id="bgvid">
            <source src="{{ asset('YCL9p7Z1Zag.webm') }}" type="video/webm">
            <source src="{{ asset('YCL9p7Z1Zag.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="container">
        <div class="row">
            <div class="home-content col-sm-6 col-sm-offset-3 text-xs-center">
                <h1 class="display-1">oshimen</h1>
                <p>an easy way to showcase the idols you support</p>
                <a href="{{ url('/register') }}" title="register">register</a> // <a href="{{ url('/login') }}" title="login">login</a><br />
                <a href="{{ url('/user/tomo') }}" title="Example">example</a>
            </div>
        </div>
    </div>
@endsection