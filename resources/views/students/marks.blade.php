@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline" style="border-top-color: #f4a02e;border-radius: 2em;">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{ asset('images')}}/{{auth()->user()->profileImage }}" style="max-width:100px;"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>
              <p class="text-center">{{ $studentd->studentID }}</p>
              <p class="text-muted text-center">{{ $Course->name }}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- About Me Box -->
          <div class="card card-primary" style="border-radius: 2em;">
            <div class="card-body">
              <strong>Intake</strong>

              <p class="text-muted">{{ $studentd->intake }}</p>

              <hr>

              <strong></i>Academic Year</strong>

              <p class="text-muted">{{ $studentd->academic_year }}</p>

              <hr>

              <strong>Mode of Delivery</strong>

              <p class="text-muted">{{ $studentd->delivery }}</p>

              <hr>

              <strong>Sponsorship</strong>

              <p class="text-muted">{{ $studentd->sponsorship }}</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-default" style="border-radius: 2em;">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-user"></i>
                {{ auth()->user()->name }} Results
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="callout">
                <div  style="margin-left:320px;margin-bottom:50px">
                  <img height="75px" width="75px" src="{{ asset('dist/img/AdminLTELogo.png')}}">
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Name:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ auth()->user()->name }}</p>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-md-5">
                    <h5>Email:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ auth()->user()->email }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Phone Numbers:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ auth()->user()->phone_1 }} <br> {{ auth()->user()->phone_2}} </p>
                  </div>
                </div>   -->
                <div class="row">
                  <div class="col-md-5">
                    <h5>Gender:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ auth()->user()->gender}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <h5>Date Of Birth:</h5>
                  </div>
                  <div class="col-md-7">
                    <p>{{ auth()->user()->date_of_birth }}</p>
                  </div>
                </div>
                @if($registrations)
                @if($registrations->semster=='Semester 1')
                <div sytle="margin-top:520px" class="row">
                <div class="col-md-6">
                <p sytle="margin-left:50%">
                <strong>Academic Year:</strong>{{ $studentd->academic_year }} </p>
                </div>
                <div class="col-md-6">
                <p sytle="margin-left:50%" >
                <strong>Semester:</strong>One
                </p>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    <h5>Course Unit Code</h5>
                  </div>
                  <div class="col-md-2">
                    <h5>course unit Name</h5>
                  </div>
                  <div class="col-md-1">
                    <h5>exam</h5>
                  </div>
                  <div class="col-md-1">
                    <h5>test</h5>
                  </div>
                  <div class="col-md-2">
                    <h5>total score</h5>
                  </div>
                  <div class="col-md-1">
                    <h5>CU</h5>
                  </div>
                  <!--<div class="col-md-3">-->
                  <!--  <h5>Remarks</h5>-->
                  <!--</div>-->

                </div>
                @foreach($stud_marks as $mark)
                <div class="row">
                  <div class="col-md-2">
                    <h5>{{$mark->course_unit_code}}</h5>
                  </div>
                  <div class="col-md-2">
                    <h5>{{$mark->course_name}}</h5>
                  </div>
                  <div class="col-md-1">
                    <h5>{{ $mark->exam }}</h5>
                  </div>
                  <div class="col-md-1">
                    <h5>{{ $mark->test }}</h5>
                  </div>
                  <div class="col-md-2">
                    <h5>{{ $mark->total_score }}</h5>
                  </div>
                  <div class="col-md-1">
                    <h5>{{ $mark->CU }}</h5>
                  </div>
                  <!--<div class="col-md-3">-->
                  <!--  <h5>Remarks</h5>-->
                  <!--</div>-->


                </div>
                @endforeach
                @endif
                @if($registrations->semster=='Semester 2')
                <div sytle="margin-top:520px" class="row">
                <div class="col-md-6">

                <strong>Academic Year:</strong>&nbsp;&nbsp;&nbsp;&nbsp; {{ $studentd->academic_year }}
                </div>
                <div class="col-md-6">
                <p sytle="margin-left:50%" >
                <strong>Semester:</strong>Two
                </p>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <h5>Course Unit Code</h5>
                  </div>
                  <div class="col-md-4">
                    <h5>course unit Name</h5>
                  </div>
                  <div class="col-md-2">
                    <h5>marks</h5>
                  </div>
                  <div class="col-md-1">
                    <h5>CU</h5>
                  </div>
                  <!--<div class="col-md-2">-->
                  <!--  <h5>Remarks</h5>-->
                  <!--</div>-->

                </div>
                @endif
                @else
                <div class="callout">
                  <strong>Please Register Your Respective Course_Units for the Semester to View your Results.</strong>
                
                  <a class="btn btn-primary" href="{{ route('registration.index') }}" >Register Here</a>
              </div>
              @endif
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
                    <td>{{ $registration->payment->amount}}</td>
                    <td>{{ $registration->student->course->fees - $registration->payment->amount}}</td>
                    <td>{{ $registration->payment->receipt_id}}</td>
                    <td>
                      @if (($registration->student->course->fees - $registration->payment->amount) == 0)
                        <button disabled class="btn btn-default">Fully Paid</button>
                      @elseif ($registration->payment->amount == 0)
                        <a href="{{ route('payment.edit', ['payment' => $registration->payment]) }}"  class="btn btn-danger">Not Paid</a>
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
