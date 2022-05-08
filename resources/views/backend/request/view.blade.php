@extends('backend.base')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <a href="{{route('career.request.index')}}">
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
            <li class="breadcrumb-item active">Requests</li>
            <li class="breadcrumb-item active">{{ $data->job_title }}</li>
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
                    <h3 class="card-title">Request For <i class="fas fa-arrow-right"></i> {{$data->job_title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"><strong>Applicant Name:</strong></div>
                        <div class="col-md-6">{{$data->first_name}} {{$data->last_name}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>job Name:</strong></div>
                        <div class="col-md-6">{{$data->job_title}}</div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6"><strong>Email:</strong></div>
                      <div class="col-md-6">{{$data->email}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Phone No.:</strong></div>
                        <div class="col-md-6">0{{  $data->phone  }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Cover Letter:</strong></div>
                        <div class="col-md-6">
                            <div class="col-md-6">{{  $data->letter  }}</div>  
                        </div>
                    </div>
                    <hr>
                </div>
              </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background: #69c3e8">
                    <h3 class="card-title">Resume</h3>
                </div>
                <div class="card-body">
                    <iframe src="{{ asset($data->resume) }}" frameborder="0" height="500" style="width: 100%"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
