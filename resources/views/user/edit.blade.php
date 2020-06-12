<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Tutorial Laravel #21 : CRUD Eloquent Laravel - www.malasngoding.com</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    PROFILE - <strong>UBAH DATA</strong> - <a href="https://www.malasngoding.com/category/laravel" target="_blank">www.malasngoding.com</a>
                </div>
                <div class="card-body">
                    <a href="/band" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user -> name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user -> email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('No HP') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user -> phone}}" required >

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="form-group row">
                            <label for="umur" class="col-md-4 col-form-label text-md-right">{{ __('Umur') }}</label>

                            <div class="col-md-6">
                                <input id="umur" type="text" class="form-control @error('umur') is-invalid @enderror" name="umur" value="{{ $user -> umur}}" required >

                                @error('umur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota" class="col-md-4 col-form-label text-md-right">{{ __('Kota') }}</label>

                            <div class="col-md-6">
                                <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ $user -> kota}}" required >

                                @error('kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Kelamin') }}</label>

                            <div class="col-md-6">
                                <input id="gender" type="radio" value= "Male" name="gender" {{$user->gender == "Male" ? 'checked' : ''}} required> Male
                                <input id="gender" type="radio" value= "Female" name="gender" {{$user->gender == "Female" ? 'checked' : ''}} required> Female

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="alatmusik" class="col-md-4 col-form-label text-md-right">{{ __('Alat Musik') }}</label>

                            <div class="col-md-6">
                            <select name="alatmusik" id="alatmusik">
                                @foreach ($alatMusik as $item)
                                    <option value={{$item->id}} {{$user->alatmusik == $item->id ? 'selected' : ''}} >{{ $item->nama_alat_musik }}</option>
                                @endforeach
                            </select>
                                @error('alatmusik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre musik yang dimainkan') }}</label>

                            <div class="col-md-6">
                            <select name="genre" id="genre">
                                < @foreach ($genreMusik as $item)
                                    <option value={{$item->id}} {{$user->genre == $item->id ? 'selected' : ''}} >{{ $item->nama_genre }}</option>
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
                            <label for="fotoprofil" value="{{ $user -> fotoprofil}}" class="col-md-4 col-form-label text-md-right">Silahkan upload foto anda <br>
                            <span class="text-small text-info">*Tidak wajib</span>
                            </label>

                            <div class="col-md-6">
                                <input type="file" class="form-control @error('fotoprofil') is-invalid @enderror" name="fotoprofil">

                                @error('fotoprofil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-warning" value="Ubah">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</html>