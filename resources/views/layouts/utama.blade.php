 @extends('home')

 @section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Timeline</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Timeline</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">10 Feb. 2014</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              @foreach($databand->reverse() as $band)
              <div>           
                <i class="fas fa-user bg-purple"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i>{{date('G:i', strtotime($band->created_at))}}</span>
                  <h3 class="timeline-header"><a href="#">User</a> baru saja membuat band</h3>

                  <div class="timeline-body">
                  <img src="{{ $band->logo }}" class="img-fluid img-thumbnail" style="height:60px;width60px;border-radius:50%;margin-right:15px" alt="Band Image">
                  {{$band->nama_band}} 
                  
                  </div>
                  <div class="timeline-footer">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Lihat</button>
                    <a class="btn btn-danger btn-sm">Delete</a>
                  </div>
                 
                </div>
              </div>
              @endforeach
            
              <div class="time-label">
                <span class="bg-green">3 Jan. 2014</span>
              </div>
             
              <div>
                <i class="fas fa-clock bg-gray"></i>
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.timeline -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Membutuhkan Posisi : {{Auth::user()->Band->skill_member}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Apply</button>
      </div>
    </div>
  </div>
</div>
    </section>
@endsection