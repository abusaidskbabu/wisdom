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
            <li class="breadcrumb-item"><a href="{{ route('services.information.index') }}">Services Info.</a></li>
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
                    <h3 class="card-title">Services Information <i class="fas fa-arrow-right"></i> {{$data->name}}</h3>
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
                                <div class="col-md-4">
                                    <label>Parent Category</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="category">
                                        <option value="null">Select Categoy</option>
                                       @foreach ($service as $ser)
                                        <option value="{{ $ser->id }}" {{ $ser->id == $data->parent ? 'selected' : ''}}>{{ $ser->name }}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Description:</strong></div>
                                <div class="col-md-8">
                                    <textarea class="form-control" rows="5" name="description" >{{ $data->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Icon:</strong></div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="file-ip-1" name="icon" accept="image/*" onchange="showPreview(event);">
                                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Icon Dimension Should Be 960*400</small>
                                    <div class="preview">
                                        <img id="file-ip-1-preview" src="{{$data->icon == null ? asset('images/noimg.jpg') : asset($data->icon)}}" height="32" width="32">
                                        <input type="hidden" name="prev_icon" value="{{$data->icon}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Image:</strong></div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="file-ip-1" name="image" accept="image/*" onchange="showPreview2(event);">
                                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted">Image Dimension Should Be 600*400</small>
                                    <div class="preview">
                                        <img id="file-ip-2-preview" src="{{asset($data->image)}}" height="60" width="60">
                                        <input type="hidden" name="prev_image" value="{{$data->image}}">
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
