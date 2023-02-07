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
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
  <div> {{Session::get('success')}}</div>
  </div>
</div>
@endif
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h2 class="card-title">Assign Lecturer course units</h2>

        </div>
        <!-- /.card-header -->
        <?php
        $courses=App\Models\User::where(['role'=>'Lecturer'])->get();
        $course_code=App\Models\Course_unit::all();
        ?>
        <form action="{{ route ('storelecturer_cu') }}" method="post" id="category_form">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <div class="form-group">
                  <label for="course">Lecturer Email:</label>
                  <select required class="form-control select2" placeholder="Select student ID" name="studentID" style="width: 100%;">
                  
                  <option value=''> Select Lecturer Email</option>  
                  @foreach ($courses as $course)
                      <option>{{ $course->email }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="CourseUnitCode">Course Unit Code:</label>
                  <select multiple class="form-control select2" placeholder="Select Course Unit Code" name="CourseUnitCode[]" style="width: 100%;" id="category">
                  
                  <option value=''> Select Course Unit Code</option>  
                  @foreach ($course_code as $course)
                      <option>{{ $course->course_unit_code}}</option>
                    @endforeach
                  </select>
                </div>


                </div>
               
            <button style="margin-left: 100px; margin-top:20px;margin-bottom:15px" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
            <button style="margin-left: 50px; margin-top:20px;margin-bottom:15px" class="btn btn-success" type="">
            <a style="color:white;" href="{{ route('lecturers.index') }}"> <i class="fa fa-fw fa-lg fa-eye"></i>View Lecture List</a> </button>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />


<script>
$(document).ready(function(){
$('#category').multiselect({
nonSelectedText: 'Select course_unit code',
enableFiltering: true,
enableCaseInsensitiveFiltering: true,
buttonWidth:'400px'
});
$('#category_form').on('submit', function(event){
event.preventDefault();
var form_data = $(this).serialize();
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url:"{{ url('storelecturer_cu') }}",
method:"POST",
data:form_data,
success:function(data)
{
$('#category option:selected').each(function(){
$(this).prop('selected', false);
});
$('#category').multiselect('refresh');
alert(data['success']);
}
});
});
});
</script>
@endsection