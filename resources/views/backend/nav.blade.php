<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: #69c3e8 !important"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="/" class="nav-link" style="color: #69c3e8 !important"><i class="fas fa-glasses"></i> Visit Site</a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" style="color: #69c3e8 !important">
        {{ auth()->user()->name }}
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header" style="background: #69c3e8">{{ auth()->user()->name }}</span>
        <div class="dropdown-divider"></div>
        <a href="{{ route('profile') }}" class="dropdown-item">
          <i class="fas fa-user mr-2"></i>View Profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('profile.settings') }}" class="dropdown-item">
          <i class="fas fa-unlock-alt mr-2"></i> Change Password
        </a>
        <div class="dropdown-divider"></div>
        <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#modal-default" style="text-align: left">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </button>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4" style="background: #69c3e8; color: #fff">
  <!-- Brand Logo -->
  <span class="brand-link mr-4">
    <img src="{{asset('images/new/WISDIM-LOGO.png')}}" height="100" width="100" alt="WISDOM Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text h4" style="color: #fff; letter-spacing: 9px">WISDOM</span>
  </span>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">FRONTEND MANAGEMENT</li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fab fa-servicestack"></i>
            <p>Services<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('services.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Our Services</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('services.information.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Services Information</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-street-view mr-3"></i>
            <p>
              Career
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('career.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Jobs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('career.request.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Requests</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('cms.index') }}" class="nav-link">
            <i class="fas fa-tasks mr-3"></i>
            <p>
              Page CMS
            </p>
          </a>
        </li>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>