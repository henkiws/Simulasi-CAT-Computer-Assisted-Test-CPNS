<section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="{{ url('admin/dashboard') }}"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Master</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">4</span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('admin/question') }}"><i class="fa fa-circle-o"></i> Question</a></li>
          {{-- <li><a href=""><i class="fa fa-circle-o"></i> Option</a></li> --}}
          <li><a href="{{ url('admin/user') }}"><i class="fa fa-circle-o"></i> User</a></li>
        </ul>
      </li>
      <li><a href="{{ url('admin/live') }}"><i class="fa fa-book"></i> <span>Live Skor</span></a></li>
      {{-- <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href=""><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
      </li> --}}
      <!--
      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      -->
    </ul>
  </section>