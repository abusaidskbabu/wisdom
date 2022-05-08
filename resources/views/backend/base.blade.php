<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="theme-color" content="#69c3e8">
  <meta name="msapplication-navbutton-color" content="#69c3e8">
  <meta name="apple-mobile-web-app-status-bar-style" content="#69c3e8">
  <meta property="og:title" content="Virtual Global Services Limited">

  <title>{{ $title }} | Wisdom Valley</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <link rel="icon" href="{{asset('images/new/WISDIM-LOGO.png')}}">
  @yield('css')
  <!-- jQuery -->
  <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
  <!-- included js -->
  <!-- Bootstrap -->
  <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE -->
  <script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
  <!-- OPTIONAL SCRIPTS -->
  <script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('backend/dist/js/demo.js') }}"></script>
  <script src="{{ asset('backend/dist/js/pages/dashboard3.js') }}"></script>
  <script src="{{asset('backend/plugins/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('js/tinymce.js')}}"></script>
  <style>
    .nav-link{
      color: #fff !important;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('backend.nav')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  {{-- Logout Modal --}}
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Logout</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are You Sure You Wanna Leave?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-primary">
            <i class="fas fa-power-off"></i>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!-- Main Footer -->
  @include('backend.footer')
</div>
<!-- ./wrapper -->
@yield('js')
@include('sweetalert::alert')
</body>
</html>
