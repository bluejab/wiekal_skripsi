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
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
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
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar pengajuan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Umur</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Asal</th>    
      <th scope="col">Keahlian</th>
      <th scope="col">Genre Favorit</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach( $calon as $calonn)
    <tr>
      <td><a href="/profile/band/ruanganku/{{$calonn->getUserId->id}}">{{$calonn->getUserId->name}}</td>
      <td>{{$calonn->getUserId->umur}}</td>
      <td>{{$calonn->getUserId->gender}}</td>
      <td>{{$calonn->getUserId->kota}}</td>
      <td>{{$calonn->getUserId->alatMusik->nama_alat_musik}}</td>
      <td>{{$calonn->getUserId->genreMusik->nama_genre}}</td>
      <td><button type="button" class="btn btn-outline-success btn-sm"
            onclick="event.preventDefault();
                document.getElementById('terima-{{$calonn->id}}').submit();">Terima</button>
            <form id="terima-{{$calonn->id}}" action="{{ route('seleksi.terima',[$calonn->id]) }}" method="POST" style="display: none;">
                 @csrf 
            </form>
            <form id="tolak-{{$calonn->id}}" action="{{ route('seleksi.tolak',[$calonn->id]) }}" method="DELETE" style="display: none;">
                 @csrf 
            </form>
      </td>
      <td><button type="button" class="btn btn-outline-danger btn-sm"
            onclick="event.preventDefault();
                document.getElementById('tolak-{{$calonn->id}}').submit();">Tolak</button>
            <form id="tolak-{{$calonn->id}}" action="{{ route('seleksi.tolak',[$calonn->id]) }}" method="DELETE" style="display: none;">
                 @csrf 
            </form>
      </td> 
    </tr>
    @endforeach
  </tbody>
</table>
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
