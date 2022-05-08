@extends('backend.base')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h3>My Profile</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">My Profile</li>
          </ol>
        </div>
      </div>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ asset($data->avatar) }}"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{ $data->name }}</h3>
  
                  <p class="text-muted text-center">Super Admin</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Name</b> <a class="float-right">{{ $data->name }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{ $data->email }}</a>
                    </li>
                  </ul>
                  <div class="row justify-content-center">
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Edit</a>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
