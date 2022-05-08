@extends('backend.base')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <a href="{{route('cms.index')}}">
                <button class="btn btn-outline-success">
                    <i class="fas fa-binoculars"></i>
                    View All
                </button>
            </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cms.index') }}">Cms</a></li>
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
                    <h3 class="card-title">Pages <i class="fas fa-arrow-right"></i> {{$data->title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6"><strong>Page Title:</strong></div>
                        <div class="col-md-6">{{$data->title}}</div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6"><strong>Slug:</strong></div>
                      <div class="col-md-6">{{$data->slug}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Description:</strong></div>
                        <div class="col-md-6">{!! $data->description !!}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Banner:</strong></div>
                        <div class="col-md-6">
                            <a href="{{asset($data->banner)}}" target="_blank">
                                <img src="{{asset($data->banner)}}" alt="{{$data->title}}" height="100" width="100">
                            </a>  
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6"><strong>Status:</strong></div>
                        <div class="col-md-6">
                            @if ($data->status == 0)
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
@endsection
