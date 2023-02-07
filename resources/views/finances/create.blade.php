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

        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Register Academic Year</h3>
        </div>
       
        <!-- /.card-header -->
        @if(Session::has('student_added'))
        <div class="alert alert-success" role="alert">
          <div> Academic Year has been succesfully added.</div>
          </div>
        </div>
        @endif
        <form action="{{ route ('finances.store') }}" enctype="multipart/form-data" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <?php
                $academic_years=App\Models\AcademicYear::all();
                ?>
                <div class="form-group">
                    <label for="academic_year">Academic Year:</label>
                    <select class="form-control select2" placeholder="Select a Year" name="academic_year" id="academic_year" style="width: 100%;" required>
                    
                      <option value="">Select Year</option>
                      @foreach ($academic_years as $academic_year)
                        <option value={{ $academic_year->id }}>{{ $academic_year->academic_years }}</option>
                      @endforeach
                      
                    </select>
                  </div>
                <?php
                $courses=App\Models\Course::all();
                ?>
                <div class="form-group">
                    <label for="course_name">Course:</label>
                    <select class="form-control select2 @error('course') is-invalid @enderror" placeholder="Select a course" name="course_name" style="width: 100%;" required>
                       <option value ="Select a Course">Select a Course</option>
                        @foreach ($courses as $course)
                        <option>{{ $course->name }}</option>
                      @endforeach
                    </select>
                    @error('intake') {{ $message }} @enderror
                  </div>
                
                <div class="form-group">
                  <label for="semester_1">Semester 1: Total_Fees</label>
                  <input type="number" class="form-control" name="semester_1" id="semester_1" required>
                </div>

                <div class="form-group">
                    <label for="semester_2">Semester 2: Total_Fees</label>
                    <input type="number" class="form-control" name="semester_2" id="semester_2" required>
                  </div>
                  <div class="form-group">
                  <a style="color:blue;"href="{{ route('course.index') }}"> <i class="fa fa-arrow-left"></i> &nbsp;Back to Courses</a>
                  </div>
                  <button class="btn btn-primary" type="submit">Register</button>

            <a style="color:blue;"href="{{ route('finances.index') }}"> <i class="fa fa-fw fa-lg fa-eye"></i> &nbsp;View Financial Structures</a>
             
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



<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
        crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script>
  function previewFile(input){
    var file=$("input[type=file]").get(0).files[0];
    if(file){
      var reader = new FileReader();
      reader.onload = function(){
        $('#previewImg').attr("src",reader.result);
      }
      reader.readAsDataURL(file);
    }
  }
  </script>


@endsection