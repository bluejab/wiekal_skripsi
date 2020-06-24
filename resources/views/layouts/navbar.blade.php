<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        @if(auth()->user()->unreadNotifications->count())
          <span class = "badge badge-danger navbar-badge">{{auth()->user()->unreadNotifications->count()}}</span>
        @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @foreach(Auth::user()->unreadNotifications as $notification)    
          <div class="dropdown-divider"></div>      
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{$notification->data['user_photo']}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                {{$notification->data['user_name']}}
                  <span class="float-right text-sm text-warning"></i></span>
                </h3>
                <p class="text-sm">Melamar di Band anda</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$notification->created_at->diffForHumans()}}</p>
              </div>
            </div>         
            @endforeach

            @foreach(Auth::user()->readNotifications as $notification)    
          <div class="dropdown-divider"></div>      
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{$notification->data['user_photo']}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                {{$notification->data['user_name']}}
                  <span class="float-right text-sm text-warning"></i></span>
                </h3>
                <p class="text-sm">Melamar di Band anda</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{$notification->created_at->diffForHumans()}}</p>
              </div>
            </div>         
            @endforeach
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="/markasread" class="dropdown-item dropdown-footer">Mark As Read</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>