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
            <a href="{{route('services.index')}}">
                <button class="btn btn-outline-success">
                    <i class="fas fa-binoculars"></i>
                    View All
                </button>
            </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
            <li class="breadcrumb-item active">{{ $data->name }}</li>
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
                    <h3 class="card-title">Services <i class="fas fa-arrow-right"></i> {{$data->name}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Name:</strong></div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" name="name" value="{{$data->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Description:</strong></div>
                                <div class="col-md-8">
                                    <textarea class="form-control" rows="3" name="description" >{{ $data->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Wallpaper:</strong></div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="file-ip-1" name="wallpaper" accept="image/*" onchange="showPreview(event);" value="{{ old('banner') }}">
                                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Image Dimension Should Be 960*400</small>
                                    <div class="preview">
                                        <img id="file-ip-1-preview" src="{{asset($data->wallpaper)}}" height="60" width="60">
                                        <input type="hidden" name="prev_wallpaper" value="{{$data->wallpaper}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Banner:</strong></div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="file-ip-1" name="banner" accept="image/*" onchange="showPreview2(event);" value="{{ old('banner') }}">
                                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Image Dimension Should Be 1500*900</small>
                                    <div class="preview">
                                        <img id="file-ip-2-preview" src="{{asset($data->banner)}}" height="60" width="60">
                                        <input type="hidden" name="prev_banner" value="{{$data->banner}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch3" name="status" value="1" {{ $data->status == 1 ? 'checked' : '' }}>
                                  <label class="custom-control-label" for="customSwitch3">Enabled</label>
                                </div>
                              </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-outline-success">Update</button>
                        </div>
                    </form>
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
