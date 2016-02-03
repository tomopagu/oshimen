<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('/styles/app.css') }}">
    </head>
    <body class="user-color__{{ $userColor }}">
        @yield('content')

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-xs-center">
                        <a href="{{ url('/') }}" title="oshimen">oshimen</a> //
                        @if (Auth::guest())
                            <a href="{{ url('/login') }}" title="login">login</a> // <a href="{{ url('/register') }}" title="register">register</a>
                        @else
                            <a href="{{ url('/user/settings') }}" title="settings">settings</a> // <a href="{{ url('/logout') }}" title="logout">logout</a>
                        @endif
                        <span class="hidden-xs-down">// <span class="hidden-sm-down">with love from </span><a href="https://tomo.pagu.co" title="tomo@pagu">tomo@pagu</a></span>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</html>
