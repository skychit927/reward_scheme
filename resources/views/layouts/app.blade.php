<!DOCTYPE html>

<html style="height: auto; min-height: 100%;" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 4.1.3-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/toastr.min.js') }}" defer></script> --}}

    <script src="{{ asset('adminlte/js/adminlte.js') }}" defer></script>
    <script src="{{ asset('adminlte/js/adminlte.min.js') }}" defer></script>
    <script src="{{ asset('adminlte/js/demo.js') }}" defer></script>

    <script src="{{ asset('adminlte/js/pages/dashboard.js') }}" defer></script>
    <script src="{{ asset('adminlte/js/pages/dashboard2.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('adminlte/css/AdminLTE.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/adminlte.css.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/adminlte.min.css.css') }}" rel="stylesheet">


    <link href="{{ asset('adminlte/css/skins/_allskin.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/skins/_allskin.min.css') }}" rel="stylesheet">



    <link href="{{ asset('adminlte/css/alt/AdminLTE-bootstrap-social.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/alt/AdminLTE-bootstrap-social.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/alt/AdminLTE-fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/alt/AdminLTE-fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/alt/AdminLTE-select2.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/alt/AdminLTE-select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/alt/AdminLTE-without-plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/alt/AdminLTE-without-plugins.min.css') }}" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- jQuery v1.9.1 -->
    {{-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> --}}


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <br>
        @include('admin.includes.session')

        <div class="container">
            <br>
                <div class="row">
                    @if(Auth::check())
                        <div class="col-lg-auto">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('years.index') }}">Year</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('classrooms.index') }}">Classroom</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('activity_types.index') }}">Activity type</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('activities.index') }}">Activity</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('product_types.index') }}">Product types</a>
                                </li>

                                <li class="list-group-item">
                                    <a href="{{ route('products.index') }}">Product</a>
                                </li>

                                {{-- <li class="list-group-item">
                                    <a href="{{ route('transitions.index') }}">Record</a>
                                </li> --}}

                                <a href="{{ route('transactions.ordering-cart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart
                                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                                </a>

                                <li class="list-group-item">
                                    <a href="{{ route('transactions.index') }}">Order</a>
                                </li>

                            </ul>
                        </div>
                    @endif

                    <div class="col-lg-8 mx-auto">
                        @yield('content')
                    </div>
                </div>


        </div>

    </div>

</body>
</html>
