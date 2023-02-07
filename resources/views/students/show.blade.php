@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid"> 
      
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
         
          @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Super User')
          <a class="btn btn-primary" href="{{ route('student.edit',['student'=>$student]) }}">Edit Student</a>
          @endif 

          
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">{{Auth::user()->role}}</li>
          </ol>
        </div>
      </div>
      
    </div><!-- /.container-fluid -->
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div class="row">
        @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
            <div> {{Session::get('success')}}</div>
            </div>
          </div>
        @endif
      </div>
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline" style="border-top-color: #f4a02e;border-radius: 2em;">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{ asset('images')}}/{{$student->profileImage }}" style="max-width:100px;"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{$student->name}}</h3>
              <p class="text-center">{{ $student->studentID }}</p>
              <p class="text-muted text-center">{{ $student->name }}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- About Me Box -->
          {{-- <div class="card card-primary">
            <div class="card-body">
              <strong>Intake</strong>

              <p class="text-muted">{{ $student->intake }}</p>

              <hr>

              <strong></i>Academic Year</strong>

              <p class="text-muted">{{ $student->academic_year }}</p>

              <hr>

              <strong>Mode of Delivery</strong>

              <p class="text-muted">{{ $student->delivery }}</p>

              <hr>

              <strong>Sponsorship</strong>

              <p class="text-muted">{{ $student->sponsorship }}</p>
            </div>
            <!-- /.card-body -->
          </div> --}}
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-default" style="border-radius: 2em;">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-user"></i>
                Personal Information
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="callout">
                <div class="row">
                  <div class="col-md-5">
                    <h5>Name:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->name }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Country:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->country}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Nationality:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->nationality }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>District:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->district }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Town:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->Town }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Postal:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->postal }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Email:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->email }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Phone Numbers:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->phone_1 }} <br> {{ $student->phone_2}} </p>
                  </div>
                </div>  
                <div class="row">
                  <div class="col-md-5">
                    <h5>Gender:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->gender}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Date Of Birth:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->date_of_birth }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Religion:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->religion }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Marital Status:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->marital_status }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Spouse Name:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->spouse_name }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Spouse Contact:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->spouse_contact }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Disability:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->disability }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Nature of Disability:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->nature_of_disability }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Father's (Guardian) Name:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->father_name }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Father's (Guardian) Contact:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->father_contact }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Mother's (Guardian) Name:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->mother_name }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Mother's (Guardian) Contact:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ $student->mother_contact }}</p>
                  </div>
                </div>
              </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  @if (auth()->user()->role != 'Student')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Payments</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Payments</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Academic Year</th>
                  <th>Semster</th>
                  <th>Course</th>
                  <th>Fees (UGX)</th>
                  <th>Paid (UGX)</th>
                  <th>Balance (UGX)</th>
                  <th>Receipt ID</th>
                  <th> </th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($registrations as $registration)
                  <tr>
                    <td>{{ $registration->academic_year}}</td>
                    <td>{{ $registration->semster}}</td>
                    <td>{{ $registration->student->course->name }}</td>
                    <td>{{ $registration->student->course->fees}}</td>
                    <td>{{ $amt}}</td>
                    <td>{{ $registration->student->course->fees - $amt}}</td>
                    <td>{{ $rep}}</td>
                    <td>
               
                      @if (($registration->student->course->fees - $amt) == 0)
                        <button disabled class="btn btn-success">Fully Paid</button>
                      @elseif ($amt == 0)
                        <a href="{{ route('payment.edit', ['payment' => $registration->payment]) }}"  class="btn btn-danger">Not Paid</a>
                        @elseif (($registration->student->course->fees - $amt)<=0)
                                <a href=""  class="btn btn-secondary">Fully Paid</a>
                      @else
                      <a href="{{ route('payment.edit', ['payment' => $registration->payment]) }}"  class="btn btn-primary">Partially Paid</a>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Academic Year</th>
                  <th>Semster</th>
                  <th>Course</th>
                  <th>Fees (UGX)</th>
                  <th>Paid (UGX)</th>
                  <th>Balance (UGX)</th>
                  <th>Receipt ID</th>
                  <th> </th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  @endif
</div>
@endsection