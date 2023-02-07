<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  @if (Auth::user()->role == 'Student')
    <a href="{{ route('students.show', ['student' => Auth::user()->id])}}" class="brand-link"> 
  @endif
  @if (Auth::user()->role == 'Admin')
    <a href="{{ route('admin.show', ['admin' => session('user')])}}" class="brand-link"> 
  @endif
  @if (Auth::user()->role == 'Accountant')
    <a href="{{ route('accountant.show', ['accountant' => session('user')])}}" class="brand-link"> 
  @endif
  @if (Auth::user()->role == 'Lecturer')
    <a href="{{ route('lecturer.show', ['lecturer' => session('user')])}}" class="brand-link"> 
  @endif
  @if (Auth::user()->role == 'Super User')
    <a href="{{ route('superUser')}}" class="brand-link"> 
  @endif
    <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div  class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img  src="{{ asset('images')}}/{{Auth::user()->profileImage }}" class="img-circle elevation-2" alt="User Image" style=" height: 90px; width: 90px"  >
        <div style="height:40px">
        <a href="#" class="d-block" style="display: flex;
        line-height: 3;">{{ auth()->user()->name }}</a>
        </div>
      </div>
      
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        @if (Auth::user()->role == 'Student')
        <li class="nav-item">
          <a href="{{ route('announcement.index') }}" class="nav-link {{ (request()->is('announcement*')) ? 'active' : '' }}">
            <p>
              Announcements
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('students.show', ['student' => Auth::user()->id]) }}" class="nav-link {{ (request()->is('student*')) ? 'active' : '' }}">
            <p>
             My Profile
            </p>
          </a>
        </li>        
      
        {{-- <li class="nav-item">
          <a href="{{ route('registration.index') }}" class="nav-link {{ (request()->is('registration*')) ? 'active' : '' }}">
            <p>
              Registration
            </p>
          </a>
        </li> --}}

        <li class="nav-item">
          
          <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
          Registration </a>
          <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
            <li class="nav-item "> <a href="{{ route('registration.index') }}" class="nav-link {{ (request()->is('registration*')) ? 'active' : '' }}">Register</a></li>
            <li class="nav-item "> <a href="{{ route('registration.show') }}" class="nav-link {{ (request()->is('registration*')) ? 'active' : '' }}">View Registration</a></li>
            
          </ul>
        </li>

        <li class="nav-item">  
          <a href="{{ route('payments', ['user' => Auth::user()->id]) }}" class="nav-link {{ (request()->is('payment*')) ? 'active' : '' }}">
            <p>
            Financial Statement
            </p>
          </a>
        </li>
        <li class="nav-item">  
          <a href="{{ route('Stud_marks', ['student' => session('user')]) }}" class="nav-link {{ (request()->is('student-marks*')) ? 'active' : '' }}">
            <p>
            Academic Records
            </p>
          </a>
        </li>
        <li class="nav-item">
        <li class="nav-item " ><a  href="{{ route('superUser.password')}}" class="nav-link">Change Password</a></li>
                  
        </li>
        <li>
        <a class="nav-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" style="right:15px;"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;&nbsp;
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
    </li>
        
        @else
        <!-- <li class="nav-item">
          <a href="{{ route('student.index') }}" class="nav-link {{ (request()->is('student*')) ? 'active' : '' }}">
            <p>
              Students
            </p>
          </a>
        </li> -->
        <li class="nav-item">
          
          <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
          Students </a>
          <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
            <li class="nav-item "><a href="{{ route('student.index') }}" class="nav-link {{ (request()->is('student*')) ? 'active' : '' }}">View All Students Records</a></li>
            @if (Auth::user()->role !== 'Accountant' && Auth::user()->role !== 'Lecturer')
            <li class="nav-item " ><a  href="{{ route('student.create') }}" class="nav-link {{ (request()->is('student*')) ? 'active' : '' }}">Add Student </a></li>
            @endif
          </ul>
        </li>
        @if (Auth::user()->role == 'Super User' || Auth::user()->role == 'Admin')
        <li class="nav-item">
          
          <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
          Accounts </a>
          <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
            <li class="nav-item "><a href="{{ route('payment.index') }}" class="nav-link {{ (request()->is('payments*')) ? 'active' : '' }}">View Payments Records</a></li>
            <li class="nav-item " ><a  href="{{ route('payment.create') }}" class="nav-link {{ (request()->is('payments*')) ? 'active' : '' }}">Add Payment Record</a></li>
            <li class="nav-item " ><a  href="{{ route('finances.index') }}" class="nav-link {{ (request()->is('payments*')) ? 'active' : '' }}">Financial Year</a></li>
          </ul>
        </li>

        <li class="nav-item">
          
          <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
          Lecturers </a>
          <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
            <li class="nav-item "><a href="{{ route('lecturers.index') }}" class="nav-link {{ (request()->is('lecturers*')) ? 'active' : '' }}">View Lecturers</a></li>
            <li class="nav-item " ><a  href="{{ route('lecturers.create') }}" class="nav-link {{ (request()->is('lecturers*')) ? 'active' : '' }}">Add Lecturer</a></li>
            
          </ul>
        </li>





        @endif
   
       


        @if (Auth::user()->role == 'Accountant')
        <!-- <li class="nav-item">
          <a href="{{ route('payment.index') }}" class="nav-link {{ (request()->is('payment*')) ? 'active' : '' }}">
            <p>
              Payments
            </p>
          </a>
        </li>  -->
        <li class="nav-item">
          
          <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
          Accounts </a>
          <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
            <li class="nav-item "><a href="{{ route('payment.index') }}" class="nav-link {{ (request()->is('payments*')) ? 'active' : '' }}">View Payments Records</a></li>
            <li class="nav-item " ><a  href="{{ route('payment.create') }}" class="nav-link {{ (request()->is('payments*')) ? 'active' : '' }}">Add Payment Record</a></li>
            <li class="nav-item " ><a  href="{{ route('finances.index') }}" class="nav-link {{ (request()->is('payments*')) ? 'active' : '' }}">Financial Year</a></li>
          </ul>
        </li>
        @endif

        @if (Auth::user()->role == 'Accountant')

        <li class="nav-item">
        <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
        My Profile  </a>
                  <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
                    <li class="nav-item " ><a  href="{{ route('superUser.show')}}" class="nav-link">Profile</a></li>
                    <li class="nav-item " ><a  href="{{ route('superUser.password')}}" class="nav-link">Change Password</a></li>
                  
                  </ul>
                </li>

          
        </li> 
          
        <li>
        <a class="nav-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" style="right:15px;"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;&nbsp;
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="">
                    @csrf
                </form>
    </li>
        @endif

        @if (Auth::user()->role == 'Lecturer')
        <li class="nav-item " ><a  href="{{ route('my_courses') }}" class="nav-link {{ (request()->is('course-Unit*')) ? 'active' : '' }}">My Courses</a></li>
        <li class="nav-item">
        <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
        Students Marks </a>
                  <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
                    <li class="nav-item " ><a  href="{{ route('marks.index') }}" class="nav-link {{ (request()->is('marks*')) ? 'active' : '' }}">View All Marks Records</a></li>
                    <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
                    Add New Marks Record(s) </a>
                  <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
                  <li class="nav-item "><a href="{{ route('createTest') }}" class="nav-link {{ (request()->is('marks*')) ? 'active' : '' }}">Enter Coursework / Test Marks </a></li>
                  <li class="nav-item "><a href="{{ route('marks.create') }}" class="nav-link {{ (request()->is('marks*')) ? 'active' : '' }}">Enter Exam Marks</a></li>
                  </ul>
                  </ul>
                </li>
          
        </li> 
        <li class="nav-item">
        <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
        User Accounts  </a>
                  <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
                    <!-- <li class="nav-item "><a href="{{route('userss',['superUser' => session('user')])}}" class="nav-link {{ (request()->is('superUser*')) ? 'active' : '' }}">View Users</a></li> -->
                    <li class="nav-item " ><a  href="{{ route('superUser.show', ['superUser' => session('user')])}}" class="nav-link {{ (request()->is('Lecturer*')) ? 'active' : '' }}">Profile</a></li>
                    <li class="nav-item " ><a  href="{{ route('superUser.password', ['superUser' => session('user')])}}" class="nav-link {{ (request()->is('superUser*')) ? 'active' : '' }}">Change Password</a></li>
                  
                  </ul>
                </li>
          
        </li>  
        <li>
        <a class="app-menu__item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" style="right:15px;"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;&nbsp;
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
    </li>        
        @endif

        @if (Auth::user()->role == 'Super User' || Auth::user()->role == 'Admin')
        <li class="nav-item">
        <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
        Academics </a>
                  <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
                    
                    
                    <li class="nav-item "><a href="{{ route('course.create') }}" class="nav-link {{ (request()->is('course*')) ? 'active' : '' }}">Add Course</a></li>
                    <li class="nav-item "><a href="{{ route('course.index') }}" class="nav-link {{ (request()->is('course*')) ? 'active' : '' }}">View All Courses</a></li>
                    <li class="nav-item " ><a  href="{{ route('course_unit.create') }}" class="nav-link {{ (request()->is('course-Unit*')) ? 'active' : '' }}">Add Course Unit</a></li>
                    <li class="nav-item " ><a  href="{{ route('course_unit.index') }}" class="nav-link {{ (request()->is('course-Unit*')) ? 'active' : '' }}">View Course Units</a></li>
                    
                  </ul>
                </li>
          
        </li> 
        <li class="nav-item">
        <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
        Students Marks </a>
                  <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
                    <li class="nav-item " ><a  href="{{ route('marks.index') }}" class="nav-link {{ (request()->is('marks*')) ? 'active' : '' }}">View All Marks Records</a></li>
                    <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
                    Add New Marks Record(s) </a>
                  <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
                  <li class="nav-item "><a href="{{ route('createTest') }}" class="nav-link {{ (request()->is('marks*')) ? 'active' : '' }}">Enter Coursework / Test Marks </a></li>
                  <li class="nav-item "><a href="{{ route('marks.create') }}" class="nav-link {{ (request()->is('marks*')) ? 'active' : '' }}">Enter Exam Marks</a></li>
                  </ul>
                  </ul>
                </li>
          
        </li> 
       
        <li class="nav-item">
        <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
        User Accounts  </a>
                  <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
                    <li class="nav-item "><a href="{{route('userss',['superUser' => session('user')])}}" class="nav-link {{ (request()->is('superUser*')) ? 'active' : '' }}">View All System Users List </a></li>
                    @if (Auth::user()->role == 'Super User')
                    <li class="nav-item "><a href="{{route('userss-admins',['superUser' => session('user')])}}" class="nav-link {{ (request()->is('superUser*')) ? 'active' : '' }}">Add New User Account </a></li>
                    @endif
                  </ul>
                </li>
                
          
        </li>  
        <li class="nav-item">
        <a  href="" class=" nav-link dropdown-toggle" data-toggle="dropdown">
        My Profile  </a>
                  <ul  style="list-style-type:none;background-color:#294a70;" class="dropdown-menu" role="menu">
                    <li class="nav-item " ><a  href="{{ route('superUser.show', ['superUser' => session('user')])}}" class="nav-link">Profile</a></li>
                    <li class="nav-item " ><a  href="{{ route('superUser.password', ['superUser' => session('user')])}}" class="nav-link">Change Password</a></li>
                  
                  </ul>
                </li>
          
        </li> 
        <li>
        <a class="nav-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" style="right:15px;"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;&nbsp;
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
    </li>
        
        @endif
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>