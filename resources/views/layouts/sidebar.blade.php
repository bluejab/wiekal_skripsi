<!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="/adminlte/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">My Band</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->fotoprofil }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>  
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Profilku
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profile.edit') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ubah Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ruanganku</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="band/daftar" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Buat Band
                <span class="right badge badge-danger">Yes</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="band/bandsaya" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Band Saya
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
            onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-th"></i>
              
              <p>
                Logout
                
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf 
          </li>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->