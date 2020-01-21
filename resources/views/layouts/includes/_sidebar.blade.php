<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
          <span>Dashboard</span>
        </a>
    </li>
    @if(auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="/karyawan">
          <span>Karyawan</span>
        </a>
    </li>
    @endif
    @if(auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="/master">
          <span>Master Kontrak & Perizinan</span>
        </a>
    </li>
    @endif

    @if(auth()->user()->role == 'std_user')
    <li class="nav-item">
        <a class="nav-link" href="/contracts">
          <span>Contract Pool</span>
        </a>
    </li>
    @endif
    @if(auth()->user()->role == 'std_user')
    <li class="nav-item">
        <a class="nav-link" href="/perizinan">
          <span>Perizinan</span>
        </a>
    </li>
    @endif

    @if(auth()->user()->role == 'access_user')
    <li class="nav-item">
        <a class="nav-link" href="/contracts">
          <span>Contract Pool (Full Access)</span>
        </a>
    </li>
    @endif
    @if(auth()->user()->role == 'access_user')
    <li class="nav-item">
        <a class="nav-link" href="/perizinan">
          <span>Perizinan (Full Access)</span>
        </a>
    </li>
    @endif
    </ul>
