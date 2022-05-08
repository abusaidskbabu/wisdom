@extends('backend.base')
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
            <li class="breadcrumb-item active">{{ $job->title }}</li>
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
                    <h3 class="card-title">Jobs <i class="fas fa-arrow-right"></i> {{$job->title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"><strong>Title:</strong></div>
                        <div class="col-md-6">{{$job->title}}</div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6"><strong>Post Date:</strong></div>
                      <div class="col-md-6">{{ date('d-M-Y', strtotime($job->date)) }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Description:</strong></div>
                        <div class="col-md-6">{!! $job->description !!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Banner:</strong></div>
                        <div class="col-md-6">
                            <a href="{{asset($job->image)}}" target="_blank">
                                <img src="{{asset($job->image)}}" alt="{{$job->title}}" height="100" width="100">
                            </a>  
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Status:</strong></div>
                        <div class="col-md-6">
                            @if ($job->status == 0)
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
</script>
@endsection
