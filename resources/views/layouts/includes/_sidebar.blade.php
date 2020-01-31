<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
    </li>
    @if(auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="/karyawan">
          <i class="fas fa-address-book"></i>
          <span>Karyawan</span>
        </a>
    </li>
    @endif
    @if(auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="/master">
          <i class="fas fa-table"></i>
          <span>Master Kontrak & Perizinan</span>
        </a>
    </li>
    @endif

    @if(auth()->user()->role == 'std_user')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('posts', ['menu' => 'contract']) }}">
          <i class="fas fa-archive"></i>
          <span>Contract Pool</span>
        </a>
    </li>
    @endif
    @if(auth()->user()->role == 'std_user')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('posts', ['menu' => 'perizinan']) }}">
          <i class="fas fa-book"></i>
          <span>Perizinan</span>
        </a>
    </li>
    @endif

    @if(auth()->user()->role == 'access_user')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('posts', ['menu' => 'contract']) }}">
          <i class="fas fa-archive"></i>
          <span>Contract Pool (Access)</span>
        </a>
    </li>
    @endif
    @if(auth()->user()->role == 'access_user')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('posts', ['menu' => 'perizinan']) }}">
          <i class="fas fa-book"></i>
          <span>Perizinan (Access)</span>
        </a>
    </li>
    @endif
    <div class="dropdown-divider"></div>
    <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#modalReset">
            <i class="fas fa-lock"></i>
            <span>Reset Password</span>
        </a>
    </li>
</ul>
