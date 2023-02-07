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
          <h3 class="card-title">Edit  {{$course->course_unit_code}}  Course Unit</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route ('course_unit.update') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="name">Course Name:</label>
                  <input type="hidden" name="id" value="{{$course->id}}">
                  <input disabled type="text" class="form-control" name="name" id="name" value="{{ $courses->name }}">
                </div>
                
                
                <div class="form-group">
                  <label for="code">Course Code:</label>
                  <input disabled type="text"  class="form-control" name="Ccode" id="Ccode" value="{{$courses->code}}">
                </div>
                
                 <div class="col-md-6 form-group">
                  <label for="name">Year Of Study:</label>
                  <select required class="form-control select2" placeholder="Select a Semester" name="YearOfStudy" style="width: 100%;">
                      
                    <option>{{ $course->YearOfStudy }}</option>
                     
                      <option>Year 1</option>
                      <option>Year 2</option>
                      <option>Year 3</option>
                      <option>Year 4</option>
                    
                  </select>
                </div>

                  <div class="col-md-6 form-group">
                  <label for="name">Semester:</label>
                  <select required class="form-control select2" placeholder="Select a Semester" name="Semester" style="width: 100%;">
                     
                    <option>{{ $course->Semester }}</option>
                
                      <option>Semester 1</option>
                      <option>Semester 2</option>
                    
                  </select>
                </div>
                <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">Course  Unit Name:</label>
                  <input   type="text" value="{{$course->course_name}}" class="form-control" name="name" id="name" required>
                </div>
                <div class=" col-md-6 form-group">
                  <label for="code">Course  Unit Code:</label>
                  <input type="text" value="{{$course->course_unit_code}}" class="form-control" name="code" id="code" required>
                </div> 
                </div>            
                <div class="row">
                <div class=" col-md-6 from-group">
                  <label for="L">L:</label>
                  <input type="number" value="{{$course->L}}" class="form-control" name="L" id="L"required>
                </div>
                <div class=" col-md-6 from-group">
                  <label for="P">P</label>
                  <input type="number" value="{{$course->P}}" class="form-control" name="P" id="P" required>
                </div>
                </div>
               <div class="row">
               <div class=" col-md-6 from-group">
                  <label for="CH">CH:</label>
                  <input type="number" value="{{$course->CH}}"  class="form-control" name="CH" id="CH" required>
                </div>
                <div class=" col-md-6 from-group" style="margin-bottom:10px">
                  <label for="CU">CU:</label>
                  <input type="number" value="{{$course->CU}}"  class="form-control" name="CU" id="CU" required>
                </div>
               </div>
              <!--col-->
              <button class="btn btn-primary" type="submit">Update</button>
            </div>
            <!--row-->
            
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