@extends('backend.base')
@section('css')
<style>
.form-input input {
  display:none;
}
.form-input img {
  display:none;
  margin-top:10px;
}
</style>
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <a href="{{route('services.information.index')}}">
                <button class="btn btn-outline-success">
                    <i class="fas fa-binoculars"></i>
                    View All
                </button>
            </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services Information</a></li>
            <li class="breadcrumb-item active">{{ $service->name }}</li>
          </ol>
        </div>
      </div>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background: #69c3e8">
                    <h3 class="card-title">Services Information <i class="fas fa-arrow-right"></i> {{$service->name}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"><strong>Name:</strong></div>
                        <div class="col-md-6">{{$service->name}}</div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6"><strong>Parent Category:</strong></div>
                      <div class="col-md-6">{{$service->ser_name}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Description:</strong></div>
                        <div class="col-md-6">{!! $service->description !!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Icon:</strong></div>
                        <div class="col-md-6">
                            <a href="{{asset($service->icon)}}" target="_blank">
                                <img src="{{$service->icon == null ? asset('images/noimg.jpg') : asset($service->icon)}}" alt="{{$service->name}}" height="32" width="32">
                            </a>  
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Image:</strong></div>
                        <div class="col-md-6">
                            <a href="{{asset($service->image)}}" target="_blank">
                                <img src="{{asset($service->image)}}" alt="{{$service->name}}" height="100" width="100">
                            </a>  
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Status:</strong></div>
                        <div class="col-md-6">
                            @if ($service->status == 0)
                            <span class="badge badge-pill badge-danger">Disabled</span>
                            @else
                            <span class="badge badge-pill badge-success">Enabled</span>
                            @endif
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
<script>
    function showPreview(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-1-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
function showPreview2(event){
  if(event.target.files.length > 0){
    var src = URL.createObjectURL(event.target.files[0]);
    var preview = document.getElementById("file-ip-2-preview");
    preview.src = src;
    preview.style.display = "block";
  }
}
</script>
@endsection
