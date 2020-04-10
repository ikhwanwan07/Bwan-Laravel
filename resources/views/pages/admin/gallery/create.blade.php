@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Gallery</h1>
  
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
<form action="{{route('gallery.store')}}" method="POST" enctype="multipart/form-data">
@csrf 
<div class="form-group">
<label for="travel_package_id">Paket Travel</label>
<select name="travel_packages_id"  class="form-control">
<option value="">Pilih Paket Travel</option>
@foreach($travel_package as $travel_packages)
<option value="{{$travel_packages->id}}">{{$travel_packages->title}}</option>
@endforeach
</select>
</div>
<div class="form-group">
<label for="image">Images</label>
<input type="file" name="image" class="form-control" placeholder="image">
</div>

<button type="submit" class="btn btn-primary bnt-block">Simpan</button>

</form>

</div>


</div>




</div>
<!-- /.container-fluid -->
@endsection