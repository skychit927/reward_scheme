@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="side-bar-username">Welcome, {!! \Auth::user()->name !!}</li>
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-tachometer"></i>
                    <span class="title">@lang('global.app_dashboard')</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span>General</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                        <a href="{{ route('auth.change_password') }}">
                            <i class="fa fa-key"></i>
                            <span class="title">@lang('global.app_change_password')</span>
                        </a>
                    </li>
                    <li>
                        <a href="#logout" onclick="$('#logout').submit();">
                            <i class="fa fa-sign-out"></i>
                            <span class="title">@lang('global.app_logout')</span>
                        </a>
                    </li>
                </ul>
            </li>
            @if (\Auth::user()->role === 'admin')
            <li>
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">User Management</span>
                </a>
            </li>
            @endif

            <li class="treeview">
                <a href="#">
                    <i class="fa fa fa-gift"></i>
                    <span>Prize Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('admin.prizes.index') }}">
                            <i class="fa fa-gift"></i>
                            <span class="title">Prize</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.prize_types.index') }}">
                            <i class="fa fa-gift"></i>
                            <span class="title">Prize Type</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-child"></i>
                    <span>Activity Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ url('#') }}">
                            <i class="fa fa-child"></i>
                            <span class="title">Activity</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('#') }}">
                            <i class="fa fa-child"></i>
                            <span class="title">Activity Type</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>Record</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-list-alt"></i>
                            <span class="title">Student Activity</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-list-alt"></i>
                            <span class="title">Student Redemption</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-list-alt"></i>
                            <span class="title">Student Sticker</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-list-alt"></i>
                            <span class="title">Teacher Distribution Sticker</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>

