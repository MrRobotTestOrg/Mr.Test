@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="http://placehold.it/160x160/00a65a/ffffff/&text={{ Auth::user()->name[0] }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
          <li><a href="{{ url('admin/modulo') }}"><i class="fa fa-list"></i> <span>Modulos</span></a></li>
          <li><a href="{{ url('admin/feature') }}"><i class="fa fa-list"></i> <span>Funcionalidades</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-newspaper-o"></i> <span>Cenários</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              @foreach (\App\Modulo::all() as $modulo)
                <li><a href="{{ url("admin/cenario?modulo={$modulo->id}") }}">- <span>{{$modulo->nome}}</span></a></li>
              @endforeach
            </ul>
          </li>

          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
