<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <img src="{{('/images/logo-header.png')}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="logo-pusri" width="36" height="72">
    <a class="navbar-brand mr-1" href="/dashboard">&nbsp; PT. Pupuk Sriwidjaja</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <button class="btn btn-light btn-block" type="button" data-toggle="modal" data-target="#modalReset">Change Password</button>
            <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/logout">Logout</a>
        </div>
      </li>
    </ul>

</nav>

<div class="modal fade bd-example-modal-lg" id="modalReset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (session('error'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
                @if (session('status'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('status') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12">
                            @error('password')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                            @error('password_confirmation')
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror
                        </div>
                    </div>
                @endif
                <form action="/password/change" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password Baru</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan password baru">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi Password Baru</label>
                        <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Konfirmasi password baru">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
