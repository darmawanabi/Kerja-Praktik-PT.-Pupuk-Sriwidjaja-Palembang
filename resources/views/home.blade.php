<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dept Hukum - PT. Pupuk Sriwidjaja Palembang</title>

  <!-- Font Awesome Icons -->
  <link href="{{asset('/home/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="{{asset('/home/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="{{asset('/home/css/creative.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">PT. Pupuk Sriwidjaja Palembang</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#login">Login</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Sistem Pengelolaan<br>Kontrak dan Perizinan<br>Departemen Hukum<br>PT. Pupuk Sriwidjaja Palembang</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#login">Sign In</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Login Section -->
  <section class="page-section" id="login">
  <div class="container">
      <h2 class="text-center mt-0">Login</h2>
        <hr class="divider my-4">
          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
              <form class="form-auth-small text-center" action="/postlogin" method="POST">
              @csrf
                  <div class="form-group">
                      <label for="signin-email" class="control-label sr-only">Nomor Badge</label>
                      <input name="id" type="text" class="form-control" id="signin-email" placeholder="No. Badge">
                  </div>
                  <div class="form-group">
                      <label for="signin-password" class="control-label sr-only">Password</label>
                      <input name="password" type="password" class="form-control" id="signin-password" placeholder="Password">
                  </div>
                  <div class="col-md-3"></div>
                  <!-- <div class="form-group clearfix">
                      <label class="fancy-checkbox element-left">
                          <input type="checkbox">
                          <span>Remember me</span>
                      </label>
                  </div> -->
                  <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                  {{-- <a class="nav-link js-scroll-trigger" href="#register">Register</a> --}}
                  <!-- <div class="bottom">
                      <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                  </div> -->
              </form>
              <div class="dropdown-divider"></div>
                <button class="btn btn-light btn-block" type="button" data-toggle="modal" data-target="#modalReset">Reset Password</button>
              </div>
          </div>
  </div>
  </section>


  <div class="modal fade bd-example-modal-lg" id="modalReset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/password/email" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email anda">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Send Reset Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
        <div class="small text-center text-muted">© {{ date('Y') }} PT. Pupuk Sriwidjaja Palembang. @lang('All rights reserved.')</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('/home/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/home/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('/home/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('/home/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('/home/js/creative.min.js')}}"></script>

</body>

</html>
