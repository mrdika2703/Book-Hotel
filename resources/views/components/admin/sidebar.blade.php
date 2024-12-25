  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('NLogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>Booking<i>Hotel</i></strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link {{ request()->is('admin/dashboard', 'admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/booking" class="nav-link {{ request()->is('admin/booking') ? 'active' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Booking
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/history-booking" class="nav-link {{ request()->is('admin/history-booking') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clock-rotate-left"></i>
              <p>
                History Booking
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/kamar" class="nav-link {{ request()->is('admin/kamar') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bed"></i>
              <p>
                Data Kamar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/hotel" class="nav-link {{ request()->is('admin/hotel') ? 'active' : '' }}">
              <i class="nav-icon fas fa-hotel"></i>
              <p>
                Fasilitas Hotel
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/users" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">{{ $slot }}</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->