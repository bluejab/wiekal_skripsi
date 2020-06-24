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
                  <h3 class="timeline-header"><a href="/profile/ruanganku/{{$band->band->user_id}}">{{$band->band->user->name}}</a> baru saja membuat band</h3>

                  <div class="timeline-body">
                  <img src="{{ $band->band->logo }}" class="img-fluid img-thumbnail" style="height:60px;width60px;border-radius:50%;margin-right:15px" alt="Band Image">
                  {{$band->nama_band}} 
                  
                  </div>
                  <div class="timeline-footer">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{ $band->id }}">Lihat</button>
                   
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
      @foreach($databand->reverse() as $band)
        <div class="modal fade" id="modal{{ $band->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"> 
                @foreach($band->alatMusik as $item)
                  {{$item->nama_alat_musik}}
                @endforeach
                            
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @empty($userBand)
                  <a href="/home/apply/{{$band->id}}" class="btn btn-primary">Apply</a>             
                @endempty
              
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </section>

@endsection