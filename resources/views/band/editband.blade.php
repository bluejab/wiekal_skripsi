<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Select2 -->
        <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">  
        <!-- Theme style -->
        <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
        <title>My Band</title>
    </head>
    <body>
    
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                     BAND - <strong>EDIT</strong>
                </div>
                <div class="card-body">
                   
                    <form method="post" action="{{ route('band.update', $user->band->id ) }}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                     <div class="form-group row">
                            <label for="nama_band" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nama_band" type="text" class="form-control @error('nama_band') is-invalid @enderror" name="nama_band" value="{{ Auth::user()->band->nama_band}}"  required >

                                @error('nama_band')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kota" class="col-md-4 col-form-label text-md-right">{{ __('Kota') }}</label>

                            <div class="col-md-6">
                                <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ Auth::user()->band->kota}}" required >

                                @error('kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Aliran musik') }}</label>

                            <div class="col-md-6">
                            <select name="genre" id="genre">
                            @foreach ($genreMusik as $item)
                                    <option value={{$item->id}} {{Auth::user()->genre == $item->id ? 'selected' : ''}} >{{ $item->nama_genre }}</option>
                                @endforeach
                            </select>
                                @error('genre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">Silahkan upload logo anda <br>
                            <span class="text-small text-info">*Tidak wajib</span>
                            </label>

                            <div class="col-md-6">
                                <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">

                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('deskripsi') }}</label>

                            <div class="col-md-6">
                                <input id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ Auth::user()->band->deskripsi}}" required >

                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-warning float-right" value="Ubah">
                        </div>

                    </form>

                </div>
            </div>
        </div>
<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Select2 -->
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

  })
</script>
    </body>
</html>