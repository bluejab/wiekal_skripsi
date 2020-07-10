<!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="/adminlte/img/mybandlogo.png"
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
          <a href="#" i class="text-success" class="d-block">{{ Auth::user()->name }}</a>  
          <!-- Status -->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Profilku
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profile.edit') }}" class="nav-link">
                <i class="nav-icon far fa-edit text-warning"></i>
                  <p>Ubah Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('profile.ruanganku') }}" class="nav-link">
                  <i class="nav-icon fas fa-home" style="color:lightskyblue"></i>
                  <p>Ruanganku</p>
                </a>
              </li>
            </ul>
          </li>
          @if(Empty($userBand)) 
          <li class="nav-item">
            <a href="{{ route('band.daftar') }}" class="nav-link">
             <i class="nav-icon fas fa-drum" ></i>
              <p>
                Buat Band
              </p>
            </a>
          </li>
          @endif
          @if(!Empty($userBand))   
          <li class="nav-item">
            <a href="{{ route('band.tentang') }}" class="nav-link">
              <i class="nav-icon fas fa-record-vinyl"></i>
              <p>
                Band Saya
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
            onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              
              <p>
                Logout
                
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf 
            </form>
          </li>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->