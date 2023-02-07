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
      <div class="card card-default" style="border-radius: 2em;">
        <div class="card-header">
          <h3 class="card-title">Register Course Unit</h3>

        </div>
        <!-- /.card-header -->
        <?php
        $courses=App\Models\Course::all();
        ?>
        <form action="{{ route ('course_unit.store') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                  <label for="course">Course Name:</label>
                  <select required class="form-control select2" placeholder="Select a course" name="course" style="width: 100%;">
                  
                  <option value=''> Select course name</option>  
                  @foreach ($courses as $course)
                      <option value="{{ $course->code }}">{{ $course->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class='row'>

                <div class="col-md-6 form-group">
                  <label for="name">Year Of Study:</label>
                  <select required class="form-control select2" placeholder="Select a Semester" name="YearOfStudy" style="width: 100%;">
                      <option value=''> Select Year Of Study</option> 
                      <option>Year 1</option>
                      <option>Year 2</option>
                      <option>Year 3</option>
                      <option>Year 4</option>
                  </select>
                </div>

                  <div class="col-md-6 form-group">
                  <label for="name">Semester:</label>
                  <select required class="form-control select2" placeholder="Select a Semester" name="Semester" style="width: 100%;">
                      <option value=''> Select semester</option> 
                      <option>Semester 1</option>
                      <option>Semester 2</option>
                  </select>
                </div>
                
                </div>
                <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Course  Unit Name:</label>
                  <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class=" col-md-6 form-group">
                  <label for="code">Course  Unit Code:</label>
                  <input type="text" class="form-control" name="code" id="code" required>
                </div> 
                </div>            
                <div class="row">
                <div class=" col-md-6 from-group">
                  <label for="L">L:</label>
                  <input type="number" class="form-control" name="L" id="L"required>
                </div>
                <div class=" col-md-6 from-group">
                  <label for="P">P</label>
                  <input type="number" class="form-control" name="P" id="P" required>
                </div>
                </div>
               <div class="row">
               <div class=" col-md-6 from-group">
                  <label for="CH">CH:</label>
                  <input type="number" class="form-control" name="CH" id="CH" required>
                </div>
                <div class=" col-md-6 from-group">
                  <label for="CU">CU:</label>
                  <input type="number" class="form-control" name="CU" id="CU" required>
                </div>
               </div>
            <button style="margin-left: 100px; margin-top:20px;margin-bottom:15px;border-radius: 2em;" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
            <button style="margin-left: 50px; margin-top:20px;margin-bottom:15px;border-radius: 2em;" class="btn btn-success" type="">
            <a style="color:white;" href="{{ route('course_unit.index') }}"> <i class="fa fa-fw fa-lg fa-eye"></i>View Course units</a> </button>

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