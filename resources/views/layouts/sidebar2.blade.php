<!-- Brand Logo -->
<a href="/home" class="brand-link">
      <img src="/adminlte/img/mybandlogo.png" 
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">My Band</span>
    </a>
    
    <style>
    .modal-backdrop {
      z-index: -1;
      }

    .modal-header {
    background-color:#4682B4;
    color: white;
}
    </style>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->AnggotaBandId->getBandId->logo }}" class="img-circle elevation-2" alt="User Image">
        </div>
        
        <div class="info">
          <a i class="text-danger" class="d-block">{{  Auth::user()->AnggotaBandId->getBandId->nama_band}}</a>  
          <!-- Status -->
        </div>
       
      </div>
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
          @if(!Empty($ketua))   
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Manajemen Band
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            @endif
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('band.carianggota') }}" class="nav-link">
                <i class="nav-icon fas fa-search" style="color:mediumseagreen"></i>
                  <p>Cari Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('band.seleksi') }}" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:darkturquoise"></i>
                  <p>Seleksi Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('band.edit') }}" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:darkorange"></i>
                  <p>Edit Band</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('band.waris') }}" class="nav-link">
                  <i class="far fa-circle nav-icon" style="color:yellow"></i>
                  <p>Ganti Pemimpin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter2">
                  <i class="nav-icon far fa-times-circle" style="color:crimson"></i>
                  <p>Bubarkan Band</p>
                </a>
                  <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle2"><strong>Confirm</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Anda yakin ingin membubarkan band?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          <a href="/bubar" class="btn btn-primary">Iya</a>                       
                        </div>
                      </div>
                    </div>
                  </div>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('band.anggota') }}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Anggota
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="buatacara" class="nav-link">
            <i class="nav-icon fas fa-calendar-plus"></i>
              <p>
                Buat Acara
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('band.lihatacara') }}" class="nav-link">
            <i class="nav-icon fas fa-calendar-day"></i>
              <p>
                Lihat Acara
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('band.tentang') }}" class="nav-link">
            <i class="nav-icon far fa-eye"></i>
              <p>
                Tentang
              </p>
            </a>
          </li>
          @if(!Empty($ketua))
          <li class="nav-item">
            <a href="band/daftar" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="nav-icon fas fa-running"></i>
            <p>
                Keluar Band
              </p>
            </a>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Attention Required</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Pindahkan kepemilikan band terlebih dahulu sebelum keluar
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="{{ route('band.waris') }}" class="btn btn-primary">Lanjut</a>
                       
                      </div>
                    </div>
                  </div>
                </div>  
          </li>
          @else
          <li class="nav-item">
            <a href="band/daftar" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="nav-icon fas fa-running"></i>
            <p>
                Keluar Band
              </p>
            </a>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header" bg>
                        <h5 class="modal-title" id="exampleModalLongTitle" ><strong>Confirm</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Anda yakin ingin keluar dari band?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="/keluar" class="btn btn-primary">Iya</a>
                       
                      </div>
                    </div>
                  </div>
                </div>
   
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
