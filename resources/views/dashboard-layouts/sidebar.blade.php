<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">
          <img class="img-fluid" src="{{ asset('assets/img/red-logo.png') }}" width="120" alt="Sadasa Red Logo">
      </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">
          <img src="{{ asset('assets/img/logo-sadasa-circle.png') }}" alt="Logo Circle" width="50" class="img-fluid">
      </a>
      </div>
      <ul class="sidebar-menu">
                <li class="menu-header">Dasbor</li>
                <li class="nav-item dropdown {{ (request()->is('dashboard')) ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dasbor</span></a>
                </li>
                <li class="menu-header">Master Data</li>
                <li class="{{ (request()->is('dashboard/parts*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('parts.index') }}"><i class="fas fa-handshake"></i> <span>Bagian</span></a></li>
                <li class="{{ (request()->is('dashboard/positions*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('positions.index') }}"><i class="fas fa-map-pin"></i> <span>Jabatan</span></a></li>
                <li class="{{ (request()->is('dashboard/employees*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('employees.index') }}"><i class="fas fa-users"></i> <span>Karyawan</span></a></li>
                    <li class="{{ (request()->is('dashboard/users*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user"></i> <span>Pengguna</span></a></li>

                <li class="menu-header">Perizinan</li>
                <li class="{{ (request()->is('dashboard/work-permit*')) ? 'active' : '' }}"><a class="nav-link" href="{{ route('work-permit.index') }}"><i class="fas fa-calendar-alt"></i> <span>Pengajuan Izin Kerja</span></a></li>
        </ul>

        <div class=" mb-4 p-3 hide-sidebar-mini">
          <a href="{{ route('logout') }}" class="btn btn-danger btn-lg btn-block btn-icon-split" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt" ></i> Logout
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </a>
        </div>
    </aside>
  </div>
