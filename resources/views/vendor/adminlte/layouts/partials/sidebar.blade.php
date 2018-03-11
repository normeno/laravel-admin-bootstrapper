<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="#" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}
                    </a>
                </div>
            </div>
    @endif

    <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control"
                       placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>

            <li class="active">
                <a href="#">
                    <i class='fa fa-dashboard'></i>
                    <span>{{ trans('admin.dashboard') }}</span>
                </a>
            </li>

            <li class="treeview">
                <a href="{{ route('admin.users.index') }}">
                    <i class='fa fa-users'></i>
                    <span>{{ trans_choice('admin.users', 10) }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans_choice('admin.users', 10) }}</a></li>
                    <li><a href="#">{{ trans_choice('admin.roles', 10) }}</a></li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
