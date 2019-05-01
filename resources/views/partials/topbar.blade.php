<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           @lang('global.global_title')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           @lang('global.global_title')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                {{-- <li>
                    <a href="{{ route('admin.shopping.show') }} class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="label label-success">{!! \Auth::user()->shopping !!}</span>
                    </a>
                </li> --}}
                <li>
                    <a style="pointer-events: none" href="#">{!! \Auth::user()->name !!}</a>
                </li>
                <li>
                    <a href="#logout" onclick="$('#logout').submit();">
                        <i class="fa fa-sign-out"></i>
                        <span class="title">@lang('global.app_logout')</span>
                    </a>
                </li>

            </ul>
        </div>
        {{-- {!! Form::select('select_location_fiter',
            \Auth::user()->location->pluck('name', 'id'),
            array_key_exists('location_id', $_COOKIE) ? $_COOKIE['location_id'] : null,
            ['class' => 'form-control select2', 'id' => 'select_location_fiter' ]) !!} --}}
    </nav>
</header>



