<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title', 'SB Admin | Dashboard')</title>
  {{-- <title>SB Admin - Dashboard</title> --}}

  <!-- Custom fonts for this template-->
  <link href="{{('/admin/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{('/admin/assets/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{('/admin/assets/css/sb-admin.css')}}" rel="stylesheet">

</head>

<body id="page-top">
<div id="wrapper">

    <div id="content-wrapper">

      <div class="container-fluid">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                    <form action="/karyawan" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        {{-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email"/>
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan password baru">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confrim Password</label>
                            <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Konfirmasi password baru">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary">Send Reset Link</button>
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->
@include('layouts/includes/_footer')
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{('/admin/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{('/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{('/admin/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for Upload File -->
  <script src="{{('/admin/assets/js/compiled-4.11.0.min.js')}}"></script>
  <script src="{{('/admin/assets/js/mdb-plugins-gathered.min.js')}}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{('/admin/assets/vendor/chart.js/Chart.min.js')}}"></script>
  <script src="{{('/admin/assets/vendor/datatables/jquery.dataTables.js')}}"></script>
  <script src="{{('/admin/assets/vendor/datatables/dataTables.bootstrap4.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{('/admin/assets/js/sb-admin.min.js')}}"></script>
  <script src="{{('/admin/assets/js/datatables-custom.js')}}"></script>
  <script src="{{('/admin/assets/js/reminder-button.js')}}"></script>

  <!-- Demo scripts for this page-->
  <script src="{{('/admin/assets/js/demo/datatables-demo.js')}}"></script>
  <script src="{{('/admin/assets/js/demo/chart-area-demo.js')}}"></script>
</body>

</html>
