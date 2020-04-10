@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Edit Paket travel {{$item->title}}</h1>
  
  </a>

</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow">
<div class="card-body">
<form action="{{route('travel-package.update', $item->id)}}" method="POST">
@csrf 
@method('PUT')
<div class="form-group">
<label for="title">Tittle</label>
<input type="text" name="title" class="form-control" placeholder="masukkan title" value="{{$item->title}}">
</div>
<div class="form-group">
<label for="location">Location</label>
<input type="text" name="location" class="form-control" placeholder="masukkan location" value="{{$item->location}}">
</div>
<div class="form-group">
<label for="title">About </label>
<textarea name="about" id="" rows="10" class="d-block w-100 form-control" value="{{$item->about}}"></textarea>
</div>
<div class="form-group">
<label for="event">Featired Event</label>
<input type="text" name="featured_event" class="form-control" placeholder="featured event" value="{{$item->featured_event}}">
</div>
<div class="form-group">
<label for="language">Language</label>
<input type="text" name="language" class="form-control" placeholder="language" value="{{$item->language}}">
</div>
<div class="form-group">
<label for="foods">Foods</label>
<input type="text" name="foods" class="form-control" placeholder="foods" value="{{$item->foods}}">
</div>
<div class="form-group">
<label for="departure_Date">Departure date</label>
<input type="date" name="departure_date" class="form-control" placeholder="departure date" value="{{$item->departure_date}}">
</div>
<div class="form-group">
<label for="duration">Duration</label>
<input type="text" name="duration" class="form-control" placeholder="duration" value="{{$item->duration}}">
</div>
<div class="form-group">
<label for="type">Type</label>
<input type="text" name="type" class="form-control" placeholder="type" value="{{$item->type}}">
</div>
<div class="form-group">
<label for="price">Price</label>
<input type="number" name="price" class="form-control" placeholder="price" value="{{$item->price}}">
</div>

<button type="submit" class="btn btn-primary bnt-block">Simpan</button>

</form>

</div>


</div>




</div>
<!-- /.container-fluid -->
@endsection