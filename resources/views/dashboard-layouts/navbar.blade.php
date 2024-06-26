<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
      {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
          <div class="dropdown-header">Notifications
            <div class="float-right">
              <a href="#">Mark All As Read</a>
            </div>
          </div>
          <div class="dropdown-list-content dropdown-list-icons">
            @foreach (auth()->user()->employee->unreadNotifications as $notification)
            <a href="#" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-desc">
                  {{ $notification->data['title'] }}
                <div class="time text-primary">
                  {{ $notification->data['messages'] }}
                </div>
                <div class="time text-secondary">
                  {{ $notification->data['status'] }}
                </div>
                <div class="time">{{ $notification->created_at->diffForHumans() }}</div>
              </div>
            </a>
            @endforeach
          </div>
          <div class="dropdown-footer text-center">
            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </li> --}}
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hai,  {{ Auth::user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="{{ route('user.profile') }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profil
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </a>
        </div>
      </li>
    </ul>
  </nav>

