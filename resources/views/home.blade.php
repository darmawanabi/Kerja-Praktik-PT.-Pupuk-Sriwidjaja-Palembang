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
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#register">Register</a>
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
          <h1 class="text-uppercase text-white font-weight-bold">Contract Pool<br>Departemen Hukum <br>PT. Pupuk Sriwidjaja Palembang</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#login">Sign In</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Register Section -->
  <section class="page-section" id="register">
    <div class="container">
      <h2 class="text-center mt-0">Register</h2>
      <hr class="divider my-4">
      <div class="row">
          <div class="col-md-12">
          <form action="/postregister/create" method="post">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">No Badge</label>
                    <input name="user_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="No Badge">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input name="nama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                </div> -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                    <option value="L">Laki - laki</option>
                    <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Role</label>
                    <select name="role" class="form-control" id="exampleFormControlSelect1">
                    <option value="std_user">Standard User</option>
                    <option value="access_user">Full Access User</option>
                    </select>
                </div>
           </div>
           <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
      </div>
    </div>
  </section>

  <!-- Login Section -->
  <section class="page-section bg-dark text-white" id="login">
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
                  <a class="nav-link js-scroll-trigger" href="#register">Register</a>
                  <!-- <div class="bottom">
                      <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
                  </div> -->
              </form>
              </div>
          </div>
  </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - PT. Pupuk Sriwidjaja</div>
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
