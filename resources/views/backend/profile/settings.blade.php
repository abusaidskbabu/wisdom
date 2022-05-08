@extends('backend.base')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h3>Change Password</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile') }}">My Profile</a></li>
            <li class="breadcrumb-item active">Settings</li>
          </ol>
        </div>
      </div>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background: #69c3e8">
                    <h3 class="card-title">Change Password</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Current Password:</strong></div>
                                <div class="col-md-8">
                                    <input type="password" class="form-control form-control-sm" name="current_password" value="{{old('current_password')}}">
                                </div>
                            </div>
                        </div>
                       <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>New Password:</strong></div>
                                <div class="col-md-8">
                                    <input type="password" class="form-control form-control-sm" name="password">
                                </div>
                            </div>
                       </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4"><strong>Re-Enter New Password:</strong></div>
                                <div class="col-md-8">
                                    <input type="password" class="form-control form-control-sm" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-outline-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
