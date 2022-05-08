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
            <a href="{{route('career.index')}}">
                <button class="btn btn-outline-success">
                    <i class="fas fa-binoculars"></i>
                    View All
                </button>
            </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('career.index') }}">Jobs</a></li>
            <li class="breadcrumb-item active">{{ $data->title }}</li>
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
                    <h3 class="card-title">Jobs <i class="fas fa-arrow-right"></i> {{$data->title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Title:</strong></div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" name="title" value="{{$data->title}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Post Date:</strong></div>
                                <div class="col-md-8">
                                    <input type="date" class="form-control form-control-sm" name="date" value="{{$data->date}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Description:</strong></div>
                                <div class="col-md-8">
                                    <textarea class="form-control" rows="10" name="description" >{{ $data->description }}</textarea>
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
                                    <small class="form-text text-muted">Banner Dimension Should Be 1500*900</small>
                                    <div class="preview">
                                        <img id="file-ip-2-preview" src="{{asset($data->image)}}" height="60" width="60">
                                        <input type="hidden" name="prev_banner" value="{{$data->image}}">
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
