@extends('backend.base')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <hr>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fab fa-servicestack"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Active Services</span>
            @php
              $service = App\Service::all()->where('status', 1);
            @endphp
            <span class="info-box-number">{{ count($service) }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-primary"><i class="fas fa-street-view"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jobs Online</span>
            @php
              $job = App\Job::all()->where('status', 1);
            @endphp
            <span class="info-box-number">{{ count($job) }}</span>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fas fa-user-md"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Job Requests</span>
            @php
              $req = App\Request::all();
            @endphp
            <span class="info-box-number">{{ count($req) }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
