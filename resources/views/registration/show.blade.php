@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

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
      <div class="col-md-12">
        <div class="card card-default" style="border-radius: 2em;">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-user"></i>
              Registration Form
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @if ($registration)
            <div class="callout" style="border-radius: 2em;">
              <strong>Already Registered </strong>
              <p>Academic Year: {{ $registration ->academic_year }}</p>
              <p>Semester: {{ $registration->semster }}</p>
              <p>Year: {{ $registration->year_of_study}}</p>
            </div>
            <div>
              <table id="" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Course Unit Name</th>
                    <th>Course Unit Code</th>
                    <th>Enrolment Mode</th>
                    <th>CU</th>
                    <th>Remove</th>

                  </tr>
                </thead>
                <tbody>
                  @if($enrollments)
                  @foreach ($enrollments as $enrollment)
                  <tr>
                    <td> {{ $enrollment->course_name }}</td>
                    <td> {{ $enrollment->course_unit_code }}</td>
                    <td> {{ $enrollment->mode_of_enrollment }}</td>
                    <td> {{ $enrollment->CU }}</td>
                    <td>
                      <form action="{{ route('registration.destroy') }}" method="get">
                        @csrf
                        <input type="hidden" value="{{$enrollment->id}}" name="id" />
                        <button class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete' type="submit" style="border-radius: 2em;">Remove</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
                <tfoot>
                  <tr>
                    <th>Course Unit Name</th>
                    <th>Course Unit Code</th>
                    <th>Enrolment Mode</th>
                    <th>CU</th>
                    <th>Remove</th>
                  </tr>
                </tfoot>
              </table>
              <a class="btn btn-primary" href="{{ route('registration.index') }}" id="submitFinalButton" style="border-radius: 2em;">Edit Registration</a>
            </div>
            @else
            <div class="callout">
              <strong>Not Yet Registered for this Semester or You are off Semester at the moment</strong>

              <a class="btn btn-primary" href="{{ route('registration.index') }}">Register Here</a>
            </div>
            @endif
          </div>
          <!-- /.card-body -->


        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection