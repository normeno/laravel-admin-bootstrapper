<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="{{ Auth::user()->name }}"/>
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>

            <li class="active">
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class='fa fa-dashboard'></i>
                    <span>{{ trans('admin.dashboard') }}</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class='fa fa-users'></i>
                    <span>{{ trans_choice('admin.users', 10) }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.users.index') }}">{{ trans_choice('admin.users', 10) }}</a></li>
                    <li><a href="{{ route('admin.roles.index') }}">{{ trans_choice('admin.roles', 10) }}</a></li>
                    <li><a href="{{ route('admin.permissions.index') }}">{{ trans_choice('admin.permissions', 10) }}</a></li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
