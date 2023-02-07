<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-light" style="background-color: #f4a02e">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      @if (Auth::user()->role == 'Student')
        {{-- <a href="{{ route('students.show', ['student' => session('user')])}}" class="nav-link">Home</a>  --}}
      @endif
      @if (Auth::user()->role == 'Admin')
        <a href="{{ route('admin.show', ['admin' => session('user')])}}" class="nav-link">Home</a> 
      @endif
      @if (Auth::user()->role == 'Accountant')
        <a href="{{ route('accountant.show', ['accountant' => session('user')])}}" class="nav-link">Home</a> 
      @endif
      @if (Auth::user()->role == 'Lecturer')
        <a href="{{ route('lecturer.show', ['lecturer' => session('user')])}}" class="nav-link">Home</a> 
      @endif
      @if (Auth::user()->role == 'Super User')
        <a href="{{ route('superUser')}}" class="nav-link" >Home</a> 
      @endif
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('contact-us') }}" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    {{-- <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li> --}}

    <!-- Logout Dropdown Menu -->
    
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-power-off"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" method="post" class="dropdown-item">
          @csrf
          <button class="btn" type="submit">Logout</button>
        </form>
        <div class="dropdown-divider"></div>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->