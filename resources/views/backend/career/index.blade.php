@extends('backend.base')
@section('css')
<link href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="{{route('career.create')}}">
            <button class="btn btn-outline-primary">
                <i class="fas fa-plus-square"></i>
                Create New
            </button>
        </a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Career</li>
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
              <h3 class="card-title">Jobs</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table id="example1" class="table table-striped">
                    <thead align="center">
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Posted At</th>
                      <th>Banner</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                      @foreach ($jobs as $job)
                      <tr>
                        <td>{{ $job->id }}</td>
                        <td>{{ $job->title }}</td>
                        <td>
                          {{ date('d-M-Y', strtotime($job->date)) }}
                        </td>
                        <td>
                          <a href="{{asset($job->image)}}" target="_blank"><img src="{{asset($job->image)}}" alt="{{asset($job->image)}}" height="70" width="70"></a>
                        </td>
                        <td>
                          {!! $job->status == 0 ? '<span class="badge badge-pill badge-danger">Disabled</span>' : '<span class="badge badge-pill badge-success">Enabled</span>' !!}
                      </td>
                      <td>
                        <button class="btn  btn-light dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item bg" href="{{route('career.view', $job->id)}}">View</a>
                            <a class="dropdown-item" href="{{route('career.edit', $job->id)}}">Edit</a>
                            <div class="dropdown-divider"></div>
                            <button type="button" name="delete" id="{{$job->id}}" class="btn btn-danger btn-block btn-sm delete_data">
                              <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.card-body -->
          </div>
        </div>
    </div>
</div>
{{-- delete modal --}}
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h2 class="modal-title">Confirmation</h2>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <h5 align="center" style="margin:0;">Are you sure you want to remove this data?</h6>
          </div>
          <div class="modal-footer">
           <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
      </div>
  </div>
</div>
@endsection
@section('js')
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "order": [[ 0, "desc" ]]
    });
  });

  jQuery(document).ready(function($){
    var service_id;

    $(document).on('click', '.delete_data', function(){
    service_id = $(this).attr('id');
    console.log(service_id);
    $('#confirmModal').modal('show');
    });

    $('#ok_button').click(function(){
    var url = '{{ route("career.delete", ":slug") }}';
    url = url.replace(':slug', service_id);
    console.log(url)
    $.ajax({
    url: url,
    beforeSend:function(){
        console.log(url);
    $('#ok_button').text('Deleting...');
    },
    success:function(data)
    {
    setTimeout(function(){
        $('#confirmModal').modal('hide');
        location.reload();
    }, 2000);
    }
    })
});
});
</script>
@endsection
