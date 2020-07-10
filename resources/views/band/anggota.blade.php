<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>My Band</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  @include('layouts.sidebar2')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 25%">
                          Nama
                      </th>
                      <th style="width: 15%">
                          Foto
                      </th>
                      <th>
                          Genre Favorit
                      </th>
                      <th style="width: 30%" class="text-center">
                          Posisi
                      </th>
                      <th style="width: 15%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($dataanggota as $anggota)
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              {{$anggota->getUserId->name}}
                          </a>
                          <br/>
                          <small>
                              Bergabung {{date("d-m-Y", strtotime($anggota->created_at))}} 
                          </small>
                      </td>
                      <td>
                          <ul class="list-inline">
                              <li class="list-inline-item">
                                  <img alt="Avatar" class="table-avatar" src="{{$anggota->getUserId->fotoprofil}}">
                              </li>
                              
                          </ul>
                      </td>
                      <td class="project-state">
                          <h5><span class="badge badge-pill badge-dark">{{$anggota->getUserId->genreMusik->nama_genre}}</span></h5>
                      </td>
                      <td class="project-state">
                          <h5><span class="badge badge-danger">{{$anggota->getUserId->AnggotaBandId->alatMusik->nama_alat_musik}}</span></h5>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="/profile/band/ruanganku/{{$anggota->getUserId->id}}">
                          <i class="fas fa-house-user"></i>
                              Kunjungi
                          </a>                        
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    <strong>&copy; 2020, </strong> Wiekal/15420959
    </div>
    <strong>⠀</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/dist/js/demo.js"></script>
</body>
</html>
