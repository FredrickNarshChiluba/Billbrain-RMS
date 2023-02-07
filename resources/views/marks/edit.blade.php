@extends('baselayout')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Edit Student Marks</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route ('marksing.update')}}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="name">Student ID:</label>
                  <input disabled type="text" class="form-control" name="name" id="name" value="{{ $course->studentID }}">
                </div>
                <input type="hidden" name="id" value="{{ $course->id }}">
                <div class="form-group">
                  <label for="Course unit code">Code:</label>
                  <input type="text" class="form-control" name="CourseUnitCode" id="code" value="{{$course->course_unit_code}}">
                </div>
               
                <div class="from-group">
                  <label for="fees">Test Mark(out of 100):</label>
                  <input type="number" class="form-control" name="test" id="test" value="{{ $course->test}}">
                </div>
                <div class="from-group">
                  <label for="fees">Exam Mark(out of 100):</label>
                  <input type="number" class="form-control" name="exam" id="exam" value="{{ $course->exam}}">
                </div>
              </div>
              <!--col-->
            </div>
            <!--row-->
            <button style="margin-top:10px" class="btn btn-primary" type="submit">Update</button>
          </div>
          <!-- /.card-body -->
        </form>
        
      </div>
      <!-- /.card -->

    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection