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
  <!-- DataTables -->
  <link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#berlangsung" data-toggle="tab">Masih Berlangsung</a></li>
                <li class="nav-item"><a class="nav-link" href="#terjadi" data-toggle="tab">Sudah Terjadi</a></li>
              </ul>
              
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="berlangsung">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                      <th>Jenis kontol</th>
                        <th>Lokasi</th>
                        <th>Tanggal Mulai</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                      </tr>
                      </thead>
                      @foreach($acaraBerlangsung as $langsung)
                      @if($langsung->waktu_selesai > $now->format('H:i'))
                      <tr>
                        <td>{{$langsung->jenis_acara}}</td>
                        <td>{{$langsung->lokasi}}</td>
                        <td>{{date("d-m-Y", strtotime($langsung->tanggal))}}</td>
                        <td>{{date("G:i", strtotime($langsung->waktu_mulai))}}</td>
                        <td>{{date("G:i", strtotime($langsung->waktu_selesai))}}</td>
                      </tr> 
                      @endif
                      @endforeach
                    </table>
                  </div>

                  <div class="tab-pane" id="terjadi">
                    <table id="example3" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                      <th>Jenis Acara</th>
                        <th>Lokasi</th>
                        <th>Tanggal Mulai</th>
                        <th>Waktu Mulai</th>
                        <th>Waktu Selesai</th>
                      </tr>
                      </thead>
                      @foreach($acaraLewat as $lewat)
                      <tr>
                      <td>{{$lewat->jenis_acara}}</td>
                      <td>{{$lewat->lokasi }}</td>
                      <td>{{$lewat->tanggal }}</td>
                      <td>{{$lewat->waktu_mulai }}</td>
                      <td>{{$lewat->waktu_selesai }}</td>
                        
                      </tr> 
                      @endforeach
                    </table>
                  </div>
                  
                </div>  
              </div>     

            </div>
          
          </div>
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<!-- DataTables -->
<script src="/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
 