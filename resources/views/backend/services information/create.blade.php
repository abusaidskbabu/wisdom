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
            <li class="breadcrumb-item active">Create Service Information</li>
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
                  <h3 class="card-title">Add Service Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name:</label>
                      <input type="text" class="form-control form-control-sm" name="name" placeholder="Enter Service Name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <select class="form-control select2" name="category">
                        <option value="null">Select Categoy</option>
                       @foreach ($data as $dt)
                        <option value="{{ $dt->id }}">{{ $dt->name }}</option>
                       @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" rows="9" name="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputFile">Icon</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input form-control-sm" id="file-ip-1" name="icon" accept="image/*" onchange="showPreview(event);" value="{{ old('wallpaper') }}">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <small class="form-text text-muted">Icon Dimension Should Be 32*32</small>
                            <div class="preview">
                                <img id="file-ip-1-preview" height="32" width="32" border="0" src="{{ asset('images/photo.png') }}">
                            </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputFile">Image:</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input form-control-sm" id="file-ip-1" name="image" accept="image/*" onchange="showPreview2(event);" value="{{ old('banner') }}">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <small class="form-text text-muted">Image Dimension Should Be 600*400</small>
                            <div class="preview">
                                <img id="file-ip-2-preview" height="100" width="100" border="0" src="{{ asset('images/photo.png') }}">
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input form-control-sm" id="customSwitch3" name="status" value="1">
                          <label class="custom-control-label" for="customSwitch3">Enabled</label>
                        </div>
                      </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <div class="row justify-content-center">
                        <button type="submit" class="btn btn-outline-success">Create</button>
                    </div>
                  </div>
                </form>
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

