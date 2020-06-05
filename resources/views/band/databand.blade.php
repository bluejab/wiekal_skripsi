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
                    CRUD Data Pegawai - <a href="https://www.malasngoding.com/category/laravel" target="_blank">www.malasngoding.com</a>
                </div>
                <div class="card-body">
                    <a href="band/daftar" class="btn btn-primary">Input Pegawai Baru</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>genre</th>
                                <th>skill</th>
                                <th>kota</th>
                                <th>logo</th>
                                <th>deskripsi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($databand as $p)
                            <tr>
                                <td>{{ $p->nama_band }}</td>
                                <td>{{ $p->genre }}</td>
                                <td>{{ $p->skill_member }}</td>
                                <td>{{ $p->kota }}</td>
                                <td>{{ $p->logo }}</td>
                                <td>{{ $p->deskripsi }}</td>
                                <td>
                                    <a href="/pegawai/edit/{{ $p->id }}" class="btn btn-warning">{{ $p->nama_band }}</a>
                                    <a href="/pegawai/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>