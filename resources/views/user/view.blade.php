<!DOCTYPE html>
<html>
<head>
     <title>Details</title>
</head>
<body>
@foreach($data as $mantap)
<h2>{{$mantap->keterangan}}</h2>
<p>

<video width="400" controls>
    <source src="{{url('/storage/'.$mantap->file)}}" type="video/mp4">
    Your browser does not support HTML5 video.
</video>
@endforeach
</body>
</html>