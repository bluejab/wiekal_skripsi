<!-- Brand Logo -->
<a href="/home" class="brand-link">
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
          <a href="#" class="d-block">dfg</a>  
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
                Manajemen Band
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/profile/{{ Auth::user()->id }}/edit " class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seleksi Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Band</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bubarkan Band</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('band.anggota') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Anggota
                <span class="right badge badge-danger">Yes</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="buatacara" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Buat Acara
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="band/daftar" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Lihat Acara
                <span class="right badge badge-danger">Yes</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="band/daftar" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tentang
                <span class="right badge badge-danger">Yes</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="band/daftar" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Keluar Band
                <span class="right badge badge-danger">Yes</span>
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
